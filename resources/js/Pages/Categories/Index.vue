<template>
  <app-layout>
    <template #header>
      <Breadcrumbs :items="breadcrumbs" />
    </template>

    <Container>
      <jet-button :href="route('categories.create')">Add new</jet-button>

      <Card class="mt-4">
        <AppTable :headers="headers"
                  :items="categories">
          <tr v-for="category in categories.data"
              :key="category.id">
            <td>{{ category.name }}</td>
            <td>{{ category.created_at_for_human }}</td>
            <td>
              <div class="flex items-center justify-end space-x-2">
                <EditBtn :url="route('categories.edit', {category: category.id})" />
                <DeleteBtn :url="route('categories.destroy', {category: category.id})"
                           module-name="category" />
              </div>
            </td>
          </tr>
        </AppTable>
      </Card>
    </Container>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import EditBtn from "@/Components/EditBtn";
import DeleteBtn from "@/Components/DeleteBtn";
import AppTable from "@/Components/Table";
import Container from "@/Components/Container";
import Card from "@/Components/Card";
import Breadcrumbs from "@/Components/Breadcrumbs";
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    categories: {},
  },

  components: {
    AppLayout,
    EditBtn,
    DeleteBtn,
    AppTable,
    JetButton,
    Container,
    Card,
    Breadcrumbs,
  },

  computed: {
    headers() {
      return [
        {
          name: "Name",
        },
        {
          name: "Created Date",
        },
        {
          name: "Action",
          class: "text-right",
        },
      ];
    },

    breadcrumbs() {
      return [
        {
          label: "Categories",
        },
      ];
    },
  },
};
</script>
