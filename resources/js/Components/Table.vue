<template>
  <div>
    <table>
      <thead>
        <tr>
          <th v-for="(header, index) in headers"
              :key="`header-${index}`"
              :class="header.class || 'text-left'">{{ header.name }}</th>
        </tr>
      </thead>
      <tbody>
        <slot></slot>
        <tr v-if="items.data.length === 0">
          <td class="p-4"
              :colspan="headers.length">
            No data available
          </td>
        </tr>
      </tbody>
    </table>

    <div v-if="items.data.length > 0"
         class="mt-4">
      <SimplePagination :prev-url="items.links.prev"
                        :next-url="items.links.next" />
    </div>
  </div>
</template>

<script>
import SimplePagination from "@/Components/SimplePagination";

export default {
  components: {
    SimplePagination
  },

  props: {
    headers: {
      type: Array,
      required: true,
    },
    items: {
      type: Object,
      required: true,
    },
  },

  data() {
    return {};
  },

  computed: {},

  methods: {},

  watch: {},

  mounted() {},
};
</script>