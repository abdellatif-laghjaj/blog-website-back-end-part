<template>
  <jet-form-section @submitted="updateHeroInformation">
    <template #title>
      About Us Information
    </template>

    <template #description>
      Update the about us data.
    </template>

    <template #form>
      <!--  Photo -->
      <div class="col-span-6 sm:col-span-6"
           v-if="$page.jetstream.managesProfilePhotos">
        <AppImage :image-url="settings.data.about_image_url"
                  label="Photo"
                  :error-message="form.error('about_image')"
                  v-model="form.about_image" />
      </div>

      <!-- description -->
      <div class="col-span-6 sm:col-span-6">
        <jet-label for="description"
                   value="Description" />
        <AppCkeditor v-model="form.about_description"></AppCkeditor>
        <jet-input-error :message="form.error('about_description')"
                         class="mt-2" />
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful"
                          class="mr-3">
        Saved.
      </jet-action-message>

      <jet-button :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing">
        Save
      </jet-button>
    </template>
  </jet-form-section>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import AppImage from "@/Components/Image";
import AppCkeditor from "@/Components/Ckeditor";

export default {
  components: {
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    AppImage,
    AppCkeditor,
  },

  props: ["settings"],

  data() {
    return {
      form: this.$inertia.form(
        {
          about_description: this.settings.data.about_description,
          about_image: null,
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },

  methods: {
    updateHeroInformation() {
      this.form.post(route("settings.save-about"), {
        preserveScroll: true,
      });
    },
  },
};
</script>
