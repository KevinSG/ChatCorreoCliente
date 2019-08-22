<template>
  <div class="container">
    <section class="header">
      <h1 class="page-title">Mesajes privados - <small>Detalles del mensaje</small></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="detal col-8 py-3">
          <form v-on:submit.prevent="handleFormSubmit()">
            <!-- <h3>{{pmStore.message}}</h3> -->
            <h3>Asunto: {{pmStore.message.subject}}</h3><span class="">{{pmStore.message.created_at}}</span>
            <div class="chat-log" id="prueba">
              <prueba v-for="(message, index) in pmStore.messageRec" :key="index" :messages = "message"></prueba>
            </div>
            <br>
            <div class="chat-composer">
            <input type="text" placeholder="escribe tu mensaje..." v-model="messageText">  
            <button class="btn btn-primary">
              <i class="fa fa-save"></i> Enviar
            </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>

  import {mapState} from 'vuex'

  export default {
    props: {
        id: {required: true}
    },
    data() {
      return{
        messageText: '',
        message: '',
      }

    },
    created () {
      this.$store.dispatch('getSubjectMessageById',this.id);

      this.$store.dispatch('setUserMessagesRec', this.id);
    },
    computed: {
      ...mapState({
        pmStore: state => state.PrivateMessageStore
      })
    },
    methods: {
      handleFormSubmit () {
        let postData = {
          'sender': this.pmStore.message.sender_id,
          'receiver': this.pmStore.message.receiver_id,
          'subject_id': this.id,
          'message': this.messageText
          
        }
        this.$store.dispatch('sendPrivateMessage', postData)
          .then(response => {
            this.messageText = '';
          })
      }
    },
    sockets: {
      message(data) {
        let message = JSON.parse(data); 
        this.$store.dispatch('newMessageNotification', message);
      }
    }
  }
</script>
<style>
  div.detal {
    border: none;
    background: #F1F1F1;
  }
  div.detal h4{
    background: #3483D1;
    color: white;
  }
  .chat-composer{
    display: flex;
  }

  .chat-composer input {
    flex: 1 auto;
  }

  .chat-composer button {
    border-radius: 0;
  }
  .chat-log .chat-message:nth-child(even){
  background-color: #ccc;
 }

 .empty {
  padding: 1rem;
  text-align: center;
 }
 #prueba{
  height: 400px;
  overflow-y: auto;
  background: white;

 }
</style>
