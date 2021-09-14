<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
            ここがajax
        <div class="card">
          <!-- ③ 変数の中身を表示 -->
          <span v-text="string"></span>
          <span v-text="number"></span>
          <span v-text="boolean"></span>
          <span v-text="array"></span>
          <span v-text="object"></span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      string: "",
      number: 0,
      boolean: false,
      array: [],
      object: {},
    };
  },
  methods: {
    getJsonData() {
      // ② AjaxでJSONを取得

      const url = "/match/ajax"; // ここでもLaravelと連携
      axios.get(url).then((response) => {
        this.string = response.data.string;
        this.number = response.data.number;
        this.boolean = response.data.boolean;
        this.array = response.data.array;
        this.object = response.data.object;
      });
    },
  },
  mounted() {
    this.getJsonData(); // ① データ取得メソッドを実行
    console.log("Component mounted.");
  },
};
</script>
