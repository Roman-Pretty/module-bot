import {nextTick} from "vue";

export function scrollToBottom(container: HTMLElement): void {

      if (container) {
        nextTick(() => {
          container.scrollTo({
            top: container.scrollHeight,
            behavior: "smooth",
          });
        });
      }
    }