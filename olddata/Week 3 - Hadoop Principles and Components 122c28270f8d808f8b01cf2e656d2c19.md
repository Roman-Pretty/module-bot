# Week 3 - Hadoop Principles and Components

# Introduction to Apache Hadoop

## Parallelising the problem

Hadoop is a MapReduce framework which executes on a cluster of networked PCs

- Each node runs a set of daemons or service to facilitate the execution of MapReduce jobs
- Computing [YARN]:
    - ResourceManager
    - NodeManager
    - JobHistoryServer
- Storage [HDFS]
    - NameNode
    - DataNode
    - SecondaryNameNode

## Nodes vs Daemons

- A **node** is a process which is running on virtual machine, physical machine or in a container
- A **daemon** is a process which runs in the background rather than being directly controlled by a user

## Hadoop Architecture

![image.png](image.png)

## Leader-follower Architecture

**Leader (1)**

- Is aware of all follower nodes
- Receives external requests
- Decides who executes what, and when
- Speaks with follower

**Follower (1..*)**

- Worker Node
- Executes the task the leader tells it to do

## Hadoop Leader-Follower Architecture

![image.png](image%201.png)

# HDFS (Hadoop Distributed File System)

## Overview

- Shared distributed storage among the nodes of the Hadoop cluster
    - Storage for input and output MapReduce jobs
    - HDFS is tailored for MapReduce jobs
- Large block size (128mb default)
    - But not too large, blocks define the minimum parallelization unit
    - Trade offs for improving data processing throughput

## HDFS Namenode

- Manages the file system namespace
- Maintains the file system tree and metadata for all files and directories in the tree
- Namespace data is stored persistently in two files:
    - Namespace image file
    - Edit log file

Also knows which Datanode possess the blocks for a given file (not persistently)

## HDFS Datanode

- The workhorse of the file system
- Stores and retrieves blocks when instructed
- Reports to Namenode periodically with a list of blocks that it is storing
- Implements block caching for blocks which are frequently accessed
    - Blocks is cached in Datanode’s memory
    - By default a block is only cached in one datanode’s memory but this is configurable

## Hadoop Nodes Daemons

- **DataNode (1..* per cluster)**
    - Stores blocks from HDFS
    - Report periodically to NameNode list of stored blocks
- **NameNode (1 per cluster)**
    - Keeps index table with (all) the locations of each block
    - Heavy task, no computation responsibilities
    - Single point of failure
- **Secondary NameNode (1 per cluser)**
    - Communicates periodically with NameNode
    - Stores backup copy of index table

## HDFS Data Distribution

Data distribution is a key element of the MapReduce model and architecture

**“Move computation to data” principle**

Blocks are replicated over the cluster for fault-tolerant purposes

- Default number of replicas is **three times**
- Spread replicas among **different physical locations**
- Improves reliability

# YARN (Yet Another Resource Navigator)

## MapReduce classic Job Tracker Architecture

![image.png](image%202.png)

## VS Job Execution Architecture (YARN)

![image.png](image%203.png)

## Hadoop Computation Tasks

- Resource Management
    - Being aware of what resources are in the cluster
    - Which resources are available/used/failed now
- Job Allocation
    - How many resources are needed to compute the job
    - Which nodes should execute each of the tasks
- Job Execution/Monitoring
    - Coordinate task execution from workers
    - Make sure the job completes, deal with failures

## Hadoop job allocation

Resource management needs to estimate how many Map and Reduce tasks are needed for a given job

- Based on **input dataset**
- Based on **job definition**

Ideally a single node (physical node, VM or container) will be allocated for each different Map/Reduce tasks

- Otherwise multiple tasks can be allocated to the same node (physical node, VM, or container)

## Job Execution: complete MapReduce job flow

- Split (logically) input data into computing chunks
- Assign one chunk to a (co-located) NodeManager
- Run 1..* Mappers
- Shuffle and Sort
- Run 1..* Reducers
- Results from the reducers create the job output

## How many Mappers are needed?

**Mapper parallelisation:**

- Each Mapper processes a different input split
- Input data size is known
    - Number of mappers = input size / split size
- If input has multiple small files, more Mappers can be invoked (Hadoop inefficiency)

## How many Reducers are needed?

**Reducer parallelisation**

- Keys are partitioned across the reducers
    - Hard to automatically estimate what is the right number
    - Too many reducers can result into too much shuffle and sort
    - **number of reducers = user defined parameter**
- In MapReduce job definition

## Hadoop Execution Daemons

Resource Manager (1 per cluster)

- Receives job requests from Hadoop clients
- Creates one ApplicationMaster per job to manage it
- Allocates containers in slave nodes, with assigned/dedicated resources
- Keeps track of the health of Node manager nodes

Node manager (1..* per cluster)

- Coordinates execution of Map and Reduce tasks at Node
- Sends heartbeat messages to ResourceManager

## Application Master/Manager

One per job. Implements the specific computing framework

- After creation, negotiates with ResourceManager how many resources will be required for the job
- Decides which nodes will run Map and Reduce jobs among the containers given by the ResourceManager
- Reports to the ResourceManager about the progress and completion of the whole job
- Is destroyed when the job is completed
- Job outcome recorded in the JobHistoryServer

## Responsibilities on computation tasks

- Resource Management
- Job Allocation
- Job Execution

## Application Manager

Three different schedulers available in YARN

- FIFO
- Capacity
- Fair

## FIFO Scheduler

First in, first out. Requests for the first application in the queue are allocated first; once its requests have been satisfied, the next application in the queue is served, and so on.

- Easy to understand
- No configuration necassery
- Not suitable for shared clusters
- Large applications will use all resources in the cluster so each application will have to wait its turn

## Capacity Scheduler

A separate dedicated queue allows a small job to start as soon as it is submitted

- Large jobs finish later
- Smaller jobs get results back in reasonable time
- The overall cluster utilisation can be low since the queue capacity is reserved for jobs in that queue

## Fair Scheduler

Cluster will dynamically balance resources between all running jobs. Just after the first (large) job starts, it is the only job running, so it gets all the resources in the cluster. When the second (small) job starts, it is allocated half of the cluster resources so that each job is using its fair share of resources

- Lag between the time the second job starts and when it receives its fair share, since it has to wait for resources to free up as containers used by the first job complete.
- High cluster utilisation
- Timely small job completion

# The Apache Hadoop Ecosystem

## Overview

Several other components can be used in the Hadoop ecosystem

Three of the important ones are:

- Security (**Kerebos**)
- Distributed Coordination Service (**Zookeeper**)
- Data ingestion from event-based data (**Flume**)

## Kerebos

By default, the security in Hadoop is set to simple which uses a simple authentication mechanism. However, malicious users to assume the root’s identity to access or delete any data in the cluster 

Kerebos prevents this by introducing a three step process to gain access to a service which are:

- Authentication: The client authenticates itself to the Authentication Server and receives a timestamped Ticket-Granting Ticket (TGT)
- Authorization: The client uses the TGT to request a service ticket from the Ticket-Granting Server
- Service request: The client uses the service ticket to authenticate itself to the server that is providing the service. In the case of Hadoop, this might be the NameNode or the resource manager.

TGTs last 10 hours by default to user will only need go through this process every 10 hours (This is also configurable). Kind of similar to Single Sign-on (SSO

## Zookeeper

- Distributed, open-source coordination service for distributed applications.
    - keeps the distributed system functioning together as a single unit via synchronization and coordination.
- keeps the distributed system functioning together as a single unit via synchronization and coordination.
    - The minimum number of servers required to run the Zookeeper is called Quorum. Zookeeper replicates whole data tree to all the quorum server.
    

## Hadoop with Automated Failover

ZKFailoverController (ZKFC) is a ZooKeeper client which implements automated failover for the NameNodes (master and secondaries) by:

- Failure detection - each NameNode maintains a persistent session in ZooKeeper. If the machine crashes, the ZooKeeper session will expire, notifying the other NameNodes that a failover should be triggered.
- Active NameNode election - If the active NameNode crashes, another node may take a special exclusive lock in ZooKeeper indicating that it should become the next active

## Flume

- **Flume** runs agents which are long-lived Java process that run sources and sinks, connected by channels
- A source in Flume produces events and delivers them to the channel
- The channel stores the events until they are forwarded to the sink
- The Flume installation is made up of a collection of connected agents running in a distributed topology
- **Flume event** is defined as a unit of data flow having a byte payload and an optional set of string attributes
- **Flume Agent** is a (JVM) process that hosts the components through which events flow from an external source to the next destination