<template>
  <div class="d-flex justify-content-center">
    <div v-on:click="under_line_light" class="col-md-6 text-center py-3">
      <h2 v-bind:class="light" class="border-danger">承認済み</h2>
    </div>
    <div v-on:click="under_line_right" class="col-md-6 text-center py-3">
      <h2 v-bind:class="right" class="border-danger">承認待ち</h2>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      light: "border-bottom",
      right: "",
    };
  },
  methods: {
    under_line_light: function () {
      this.light = "border-bottom";
      this.right = "";
    },
    under_line_right: function () {
      this.light = "";
      this.right = "border-bottom";
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
