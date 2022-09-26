<template>
  <app-layout>
    <template #header>
      <Breadcrumbs :items="breadcrumbs" />
    </template>

    <Container>
      <jet-button :href="route('articles.create')">Add new</jet-button>

      <Card class="mt-4">
        <AppTable :headers="headers"
                  :items="articles">
          <tr v-for="article in articles.data"
              :key="article.id">
            <td>{{ article.title }}</td>
            <td>{{ article.category.name }}</td>
            <td>{{ article.created_at_for_human }}</td>
            <td>
              <div class="flex items-center justify-end space-x-2">
                <EditBtn :url="route('articles.edit', {article: article.id})" />
                <DeleteBtn :url="route('articles.destroy', {article: article.id})"
                           module-name="article" />
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
import SimplePagination from "@/Components/SimplePagination";
import AppTable from "@/Components/Table";
import Container from "@/Components/Container";
import Card from "@/Components/Card";
import Breadcrumbs from "@/Components/Breadcrumbs";
import JetButton from "@/Jetstream/Button";

export default {
  props: {
    articles: {},
  },

  components: {
    AppLayout,
    EditBtn,
    DeleteBtn,
    SimplePagination,
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
          name: "Title",
        },
        {
          name: "Category",
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
          label: "Articles",
        },
      ];
    },
  },
};
</script>
