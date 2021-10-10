<template>
  <div id="vue-content">
    <div ref="displayEnd">
      <div v-for="message in messages" :key="message.id">
        <div
          class="
            card-body
            mb-2
            border
            bg-success
            text-white
            d-table
            mr-auto
            rounded
            mw-75
            ml-3
          "
          v-if="message.user_id !== this.myId"
        >
          {{ message.comment }}
        </div>
        <div
          class="
            card-body
            mb-2
            border
            bg-info
            text-white
            d-table
            ml-auto
            rounded
            mw-75
            mr-3
          "
          v-if="message.user_id === this.myId"
        >
          {{ message.comment }}
        </div>
      </div>
      <form @submit.prevent="messageCreate" class="fixed-bottom input-chat">
        <input v-model="newMessage.comment" type="text" class="w-75" />
        <button class="w-25">送信</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: ["room", "myId"],
  data() {
    return {
      messages: {
        comment: "",
      },
      newMessage: {
        comment: "",
        user: this.myId,
        room: this.room,
      },
    };
  },

  methods: {
    getMessage() {
      axios
        .get("/message/api/" + this.room)
        .then((response) => {
          this.messages = response.data.messages;
        })
        .catch((error) => {
          console.log(error);
        });
    },

    messageCreate() {
      if (this.newMessage.comment != "") {
        axios.post("/message/create/api", this.newMessage).then((response) => {
          this.newMessage.comment = "";
        });
      }
    },
  },
  mounted() {
    this.getMessage();
    Echo.channel("chat").listen("MessageCreated", (e) => {
      this.getMessage();
    });

  },
};
</script>
