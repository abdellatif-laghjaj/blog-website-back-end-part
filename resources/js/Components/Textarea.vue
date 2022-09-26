<template>
  <textarea class="form-input rounded-md shadow-sm w-full"
            rows="5"
            :value="value"
            @input="$emit('input', $event.target.value)"></textarea>
</template>

<script>
export default {
  props: ["value"],
};
</script>

