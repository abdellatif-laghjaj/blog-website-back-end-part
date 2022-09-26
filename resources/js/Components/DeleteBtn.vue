<template>
  <div class="flex items-center">
    <button @click.prevent="show = true">
      <svg class="w-4 h-4 text-red-500"
           fill="none"
           stroke="currentColor"
           viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
      </svg>
    </button>

    <jet-confirmation-modal :show="show">
      <template #title>
          Delete {{ moduleName }}
      </template>

      <template #content>
          Are you sure you wan to delete this {{ moduleName }}
      </template>

      <template #footer>
          <jet-secondary-button @click.native="show = false">
            Nevermind
          </jet-secondary-button>

          <jet-danger-button class="ml-2"
                              @click.native="deleteItem"
                              :class="{'opacity-25': form.processing}"
                              :disabled="form.processing">
            Delete
          </jet-danger-button>
      </template>
    </jet-confirmation-modal>
  </div>
</template>

<script>
import JetConfirmationModal from "@/Jetstream/ConfirmationModal";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetDangerButton from "@/Jetstream/DangerButton";

export default {
  props: {
    url: {
      required: true,
      type: String,
    },
    moduleName: {
      required: true,
      type: String,
    }
  },

  components: {
    JetConfirmationModal,
    JetSecondaryButton,
    JetDangerButton,
  },

  data() {
    return {
      show: false,
      form: this.$inertia.form({})
    }
  },

  methods: {
    deleteItem() {
      this.form.delete(this.url);
    }
  }
};
</script>