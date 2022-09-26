<template>
  <ckeditor :editor="editor"
            v-model="text"
            :config="editorConfig"></ckeditor>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

export default {
  props: {
    value: {},
  },

  data() {
    return {
      text: "",
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
      },
    };
  },

  watch: {
    value: {
      immediate: true,
      handler(value) {
        this.text = value;
      },
    },

    text(text) {
      this.$emit("input", text);
    },
  },
};
</script>