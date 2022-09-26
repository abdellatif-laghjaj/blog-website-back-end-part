<template>
  <app-layout>
    <template #header>
      <Breadcrumbs :items="breadcrumbs" />
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          The dashboard page content
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Breadcrumbs from "@/Components/Breadcrumbs";

export default {
  components: {
    AppLayout,
    Breadcrumbs,
  },

  computed: {
    breadcrumbs() {
      return [
        {
          label: "Dashboard",
        },
      ];
    },
  },
};
</script>
