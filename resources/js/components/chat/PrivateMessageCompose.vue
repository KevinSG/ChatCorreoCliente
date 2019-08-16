<template>
  <div class="container">
    <section class="header">
      <h1 class="page-title">Mesajes privados - <small>Enviar mensaje</small></h1>
      <br>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-sm-8">
          <form v-on:submit.prevent="handleFormSubmit()">
            <div class="form-group">
              <!-- <label>{{pmStore.users[0].email}}</label> -->
              <!-- <multiselect v-model="userSelected" placeholder="Seleciona un usuario" :options="pmStore.users" :searchable="true" :close-on-select="true" :show-labels="true" track-by="id" label="name">
              </multiselect> -->

              <!-- <input type="text" v-model="userSelected" class="form-control" disabled="true" :placeholder="pmStore.users[0].email"> -->
            </div>

            <div class="form-group">
              <label for="">Asunto</label>
              <input type="text" v-model="subject" class="form-control" placeholder="Escribe tu asunto" required>
            </div>

            <div class="form-group">
              <label for="">Correo</label>
              <input type="text" v-model="correo" class="form-control" placeholder="Escrbe tu correo" required>
            </div>

            <button class="btn btn-primary">
              <i class="fa fa-save"></i> Enviar
            </button>
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
        // user: {required: true}
    },
    data () {
      return {
          //userSelected: null,
          subject: '',
          correo: ''
      }
    },
    computed: {
      ...mapState({
        pmStore: state => state.PrivateMessageStore
      })
    },
    created () {
      this.$store.dispatch('getUserList')
    },
    methods: {
      handleFormSubmit () {
        console.log();
        let postData = {
          'sender': this.correo,
          'receiver': this.pmStore.users[0].email,
          'subject': this.subject
        }
        this.$store.dispatch('sendSubject', postData)
          .then(response => {
            console.log(response.data.data.id);
            location.href = '/detalles/'+response.data.data.id;
          })
      }
    }
  }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css">

