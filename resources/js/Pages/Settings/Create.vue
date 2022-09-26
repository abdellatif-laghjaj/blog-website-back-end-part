<template>
    <app-layout>
        <template #header>
            <Breadcrumbs :items="breadcrumbs"/>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateHeroData :settings="settings"/>

                <jet-section-border/>

                <UpdateAboutData :settings="settings"/>

                <jet-section-border/>

                <UpdateContactData :settings="settings"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import UpdateHeroData from "./UpdateHeroData";
import UpdateAboutData from "./UpdateAboutData";
import UpdateContactData from "./UpdateContactData";
import JetSectionBorder from "@/Jetstream/SectionBorder";
import Breadcrumbs from "@/Components/Breadcrumbs";

export default {
    props: ["settings"],

    components: {
        AppLayout,
        UpdateHeroData,
        JetSectionBorder,
        UpdateAboutData,
        UpdateContactData,
        Breadcrumbs,
    },

    computed: {
        breadcrumbs() {
            return [
                {
                    label: "Settings",
                },
            ];
        },
    },
};
</script>
