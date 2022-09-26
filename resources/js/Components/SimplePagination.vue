<template>
  <div class="flex items-center justify-between">
    <jet-button :href="prevUrl"
                :disable="!prevUrl"
                :class="{'opacity-50': !prevUrl}">Previous</jet-button>
    <jet-button :href="nextUrl"
                :disable="!nextUrl"
                :class="{'opacity-50': !nextUrl}">Next</jet-button>
  </div>
</template>

<script>
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    prevUrl: {},
    nextUrl: {},
  },

  components: {
    JetButton,
  },
};
</script>