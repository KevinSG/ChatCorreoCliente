<template>
  <div class="container">
    <section class="header">
      <h1 class="page-title">Mesajes privados - <small>Mensajes Enviados</small></h1>
      <br>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-sm-8">
          <!-- <h1>{{pmStore.messageSent.data}}</h1> -->
          <table class="table table-striped table-hover table-bordered table-condensed message-table">
            <thead>
              <tr>
                <th>Enviado por</th>
                <th>Asunto</th>
                <th>Tiempo</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="message in pmStore.messageSent.data">
                 <td>{{message.sender.name}}</td>
                <td>
                  <a :href="`/detalles/${message.id}`">{{message.subject}}</a>
                </td>
                <td>{{message.created_at}}</td>
              </tr> 
            </tbody>
          </table>
        </div>
      </div>
    </section>

  </div>
</template>

<script>

  import {mapState} from 'vuex'

  export default {
    props: {
        user: {required: true}
    },
    computed: {
      ...mapState({
        pmStore: state => state.PrivateMessageStore
      })
    },
    created () {
      this.$store.dispatch('setUserSubjectSent', this.user)
    }
  }
</script>

