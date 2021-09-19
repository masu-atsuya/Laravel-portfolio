<template>
  <div class="container">
    <div class="row justify-content-center">
      チャット
      <div class="col-md-8">
        <div v-for="message in messages" :key="message.id" class="card-body mb-3 w-75 ml-auto border bg-info">
          {{ message.comment }}
          </div>
        <div class="card">
          <form @submit.prevent="messageCreate">
            <input type="hidden" value="" />
            メッセージ作成：<input v-model="newMessage.comment" type="text" />
            <button>送信</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [
   "messages"
  ],
  data() {
    return {
      newMessage: [],
    };
  },
  methods: {
  

    messageCreate() {
      if (this.newMessage.comment != "") {
        axios.post("/message/create/api", this.newMessage).then((response) => {
          this.newMessage.comment = "";
        });
      }
    },
  },
  mounted() {
  },
};
</script>
