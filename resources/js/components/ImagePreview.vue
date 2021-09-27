<template>

  <input type="file" accept="image/*" @change="onFileChange($event)" class="form-control-file" name='image' id="image">
  <img :src="imageData" v-if="imageData" class="w-100"/> 


</template>

<script>
export default {
  data() {
    return {
      imageData: "",
    };
  },
  methods: {
    onFileChange(e) {
      const files = e.target.files;

      if (files.length > 0) {
        const file = files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
          this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
  },
  mounted() {
    this.onFileChange();
  },
};
</script>
