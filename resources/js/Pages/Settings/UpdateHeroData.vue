<template>
    <jet-form-section @submitted="updateHeroInformation">
        <template #title>
            Hero Information
        </template>

        <template #description>
            Update the hero section data.
        </template>

        <template #form>
            <!--  Photo -->
            <div class="col-span-6 sm:col-span-6" v-if="$page.jetstream.managesProfilePhotos">
                <AppImage :image-url="settings.data.hero_image_url" label="Photo" :error-message="form.error('hero_image')" v-model="form.hero_image" />
            </div>

            <!-- description -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="description" value="Description" />
                <AppTextarea id="description" type="text" class="mt-1 block w-full" v-model="form.hero_description" autocomplete="description" />
                <jet-input-error :message="form.error('hero_description')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import AppTextarea from "@/Components/Textarea";
    import AppImage from "@/Components/Image";

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            AppTextarea,
            AppImage,
        },

        props: ['settings'],

        data() {
            return {
                form: this.$inertia.form({
                    hero_description: this.settings.data.hero_description,
                    hero_image: null,
                }, {
                    resetOnSuccess: false,
                }),
            }
        },

        methods: {
            updateHeroInformation() {
                this.form.post(route('settings.save-hero'), {
                    preserveScroll: true
                });
            },
        },
    }
</script>
