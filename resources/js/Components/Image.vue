<template>
  <div>
    <input type="file"
           class="hidden"
           ref="photo"
           @change="updatePhotoPreview">

    <jet-label for="photo"
               :value="label" />

    <!-- Current Profile Photo -->
    <div class="mt-2"
         v-show="! photoPreview">
      <img :src="imageUrl"
           class="rounded-full h-20 w-20 object-cover">
    </div>

    <!-- New Profile Photo Preview -->
    <div class="mt-2"
         v-show="photoPreview">
      <span class="block rounded-full w-20 h-20"
            :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
      </span>
    </div>

    <jet-secondary-button class="mt-2 mr-2"
                          type="button"
                          @click.native.prevent="selectNewPhoto">
      Select A New Photo
    </jet-secondary-button>

    <jet-input-error :message="errorMessage"
                     class="mt-2" />
  </div>
</template>

<script>
import JetLabel from "@/Jetstream/Label";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    JetLabel,
    JetSecondaryButton,
    JetInputError,
  },

  props: {
    imageUrl: {},
    label: {},
    errorMessage: {},
  },

  data() {
    return {
      photoPreview: null,
    };
  },

  computed: {},

  methods: {
    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
      this.$emit("input", this.$refs.photo.files[0]);
    },

    selectNewPhoto() {
      this.$refs.photo.click();
    },
  },

  watch: {},

  mounted() {},
};
</script>