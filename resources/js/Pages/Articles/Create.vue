<template>
  <app-layout>
    <template #header>
      <Breadcrumbs :items="breadcrumbs" />
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form class="p-4 sm:p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg"
              @submit.prevent="saveArticle">
          <AppImage class="mt-2"
                    v-model="form.image"
                    :image-url="imageUrl"
                    label="Image"
                    :error-message="form.error('image')" />

          <div class="mt-4">
            <jet-label for="category"
                       value="Category" />

            <select name="category"
                    id="category"
                    class="block w-full form-input"
                    v-model="form.category_id">
              <option value="">Select</option>
              <option v-for="category in categories.data"
                      :key="category.id"
                      :value="category.id">{{ category.name }}</option>
            </select>
            <jet-input-error :message="form.error('category_id')"
                             class="mt-2" />
          </div>

          <div class="mt-4">
            <jet-label for="title"
                       value="Title" />
            <jet-input id="title"
                       type="text"
                       class="mt-1 block w-full"
                       v-model="form.title"
                       autocomplete="title" />
            <jet-input-error :message="form.error('title')"
                             class="mt-2" />
          </div>

          <div class="mt-4">
            <jet-label for="slug"
                       value="Slug" />
            <jet-input id="slug"
                       type="slug"
                       class="mt-1 block w-full"
                       v-model="form.slug"
                       autocomplete="slug" />
            <jet-input-error :message="form.error('slug')"
                             class="mt-2" />
          </div>

          <div class="mt-4">
            <jet-label for="description"
                       value="Description" />

            <AppCkeditor class="mt-1"
                         v-model="form.description" />

            <jet-input-error :message="form.error('description')"
                             class="mt-2" />
          </div>

          <div class="mt-4">
            <jet-button :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing">
              Save
            </jet-button>
          </div>
        </form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Breadcrumbs from "@/Components/Breadcrumbs";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import AppImage from "@/Components/Image";
import AppCkeditor from "@/Components/Ckeditor";
import { strSlug } from "@/helpers.js";

export default {
  components: {
    AppLayout,
    JetInput,
    JetInputError,
    JetLabel,
    Breadcrumbs,
    JetSecondaryButton,
    JetButton,
    AppImage,
    AppCkeditor,
  },

  props: {
    edit: Boolean,
    article: Object,
    categories: {
      type: Object,
      default: function () {
        return {
          data: [],
        };
      },
    },
  },

  data() {
    return {
      imageUrl: "",
      form: this.$inertia.form(
        {
          "_method": this.edit ? 'PUT' : "",
          category_id: "",
          title: "",
          slug: "",
          description: this.edit ? this.article.data.description : "",
          image: "",
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },

  computed: {
    breadcrumbs() {
      return [
        {
          label: "Articles",
          url: this.route("articles.index"),
        },
        {
          label: "Add Article",
        },
      ];
    },
  },

  methods: {
    saveArticle() {
      this.edit
        ? this.form.post(route("articles.update", { id: this.article.data.id }))
        : this.form.post(route("articles.store"));
    },
  },

  watch: {
    "form.title"(title) {
      if (this.edit) return;

      this.form.slug = strSlug(title);
    },
  },

  mounted() {
    if (this.edit) {
      this.form.category_id = this.article.data.category_id;
      this.form.title = this.article.data.title;
      this.form.slug = this.article.data.slug;
    }

    this.imageUrl = this.article.data.image_url;
  },
};
</script>
