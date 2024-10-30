# Week 1 - Intro to Big Data and Parallelism

# Organisation and Assessment Stuff

# Aims of the module

- To provide a rigorous understanding of big data processing technologies and their applications
- To provide a practical understanding of how to design and develop big data programming. This module is very practical so it is important to revise Python
- To allow us to critically engage with current and future developments in data science

# Required Python

- The **mrjob** package for MapReduce
- the **pyspark** package for Spark
- All the labs and coursework will be done in Python. We will use pyspark more than mrjob.

# Assessments

- January exam worth 50%
    - Covering lectures, **labs,** practical exercises and reading materials
- Individual Coursework also worth 50%
    - Takes **6 weeks** so start as soon as its given lmao
    - Most likely releases at the end of week 5
    - Deadline: End of week **11**

# Labs

[https://hub.comp-teach.qmul.ac.uk](https://hub.comp-teach.qmul.ac.uk/)

# What is Big Data?

## Different Definitions

- “Big data is a term used to refer to data sets that are too large or complex for traditional data processing application software to adequately deal with” [Wikipedia]
- “Big data is high-volume, high velocity and/or high-variety (3Vs) data assets that demand cost-effective, innovative forms of information processing that enable enhanced insight, decision making and process automations.” [Gartner]

## Data VS Information

Key difference:

- Data is raw unorganized facts that need to be processed to make meaningful
- Information however is a set of data which has been processed in a meaningful way according to the given requirements

So:

- **Data:** facts, observations, perceptions numbers, characters, symbols, images, etc.
- **Information:** processed data which includes data that possesses context, relevance and purpose

![image.png](image.png)

## Why Big Data?

A conventional data engineering system might not be suitable for a particular application **because of insufficient:**

- **Storage:** data doesn’t fit in the hard disk
- **I/O:** The speed at which data can be retrieved does not meet the volume of requests
- **Processing speed:** The speed at which instructions are executed by the processing unit is too low to produce on time the desired results for the volume of data or volume of requests
- **Memory:** The volume of data that needs to be processing does not fit in the RAM

In all these cases we need **Big Data Techologies**

## Big Data → Parallel Processing

- Datasets are too large and complex making it impractical to analyse them on single computing node
- **SOLUTION:** Multiple computing nodes analyse the data to produce information in a reasonable time
- **CAUTION:** Consider problems and challenges associated with parallel processing

# Parallel Processing

## Traditional Sequential Program Execution

- Basic model based on John von Neumann architecture in 1945
- One instruction is fetched, decoded and executed at a time
- As processor speed increases, more instructions can be executed per same duration of time

## Limitations of Single Processor

- Reached the practical limitations in the amount of computing power a single processor  can handle
- We cannot make processors much faster or bigger (silicon manufacturing processing limitation)
- Moore’s law states that the number of transistors per chip will continue to increase
    - More transistors are great but if the clock speed is greater than 4GHz the chips tend to melt from heat
- Alternatively modern chips contain an increasing amount of processing cores
    - This is known as multicore chips

## Beyond Conventional Computing: Scaling Up

The performance of our data processing systems can be improved by increasing the processing, storage, and I/O of a single machine. This is scaling up or vertical scaling.

Up until the early 2000s, single processors speed increased steadily. Physical limitations were achieved, leading to computer architectures consisting of **multiple cores** (processors):

- Any modern laptop will have 2 cores minimum
- IBM Power System E980 has 192 cores

## Beyond Conventional Computing: Scaling Out

A second option to increase the performance of our data engineering system is to add more machines. This is known as scaling out or horizontal scaling.

A set of machines that work together is a single system is known as a Server Cluster (or Data Center), and each individual machine is known as a node. Cluster nodes are interconnected through fast networks.

## What is parallel processing?

- Using more than one processor in parallel to perform a calculation or solve a problem
- The calculation will be divided into tasks, sent to different processors at the same time
- Processors can be different cores in the same machine, and/or different machines linked by a network
- **Processors need to be synchronised and have some method of communication**

## Concurrent vs Parallel Processing

- Concurrent
    - If the node has only a single CPU, then the application or task(s) do not progress at exactly the same time, but **virtually** more than one app/task is in progress at a time on a CPU. Involves context switching between apps/programs/applications
- Parallel
    - The node has more than one CPU or CPU core, and makes progress on more than one task simultaneously
    - Tasks are ideally independent, otherwise some form of synchronisation is needed

## Challenges of Parallel Processing

Several challenges hinder the efficient use of parallel processing

- Many algorithms are **hard to be divided** into subtasks (or cannot be divided at all → lack of luck)
    - Some problem areas are much easier than others to make parallel
- Subtasks might use results from each other, so **coordinating the different tasks** might be difficult
    - Lack of proper coordination can result in the task failing or producing wrong results
- Communication network is the **bottleneck**
    - The data exchange between the processors can overwhelm the shared network

# The Big Data Pipeline

## Overview

The big data pipeline consists of a sequence of three data actions:

- Data sources are the input to the pipeline
- The output can be another big data pipeline, small data analysis, query system, visualisation or an action
    
    ![image.png](image%201.png)
    

A data source is any mechanism that produces data. Examples of data sources include:

- Mobile and web apps
- Websites
- IoT devices
- Databases
- Output of other Big Data pipelines

## Ingestion →

The **ingestion** stage gathers and pre-processes the incoming data from a variety of data sources and makes the data readily usable by the onward stages

- Ingested data can be stored or directly processed
- Data is moved from the original sources across a network, hence communication protocols such as HTTP, MQT, or FTP can be used during ingestion
- Data ingestion can include **transformations operations** on raw data

## Storage →

After ingestion, data are usually stored in the target processing nodes for future processing

- Alternatively, due to the high-volumes of data, **distributed storage** solutions are used
- Distributed storage needs to provide flexibility and fast retrieval of high-volumes of data

## Processing

Processing runs the algorithms intended to process the big data

- Data can come directly from the ingestion stage (bypassing storage) or from storage
- The results of the processing stage can be stored back in the storage system or be used as an input of the pipeline
- Can be **batch, stream or graph processing**