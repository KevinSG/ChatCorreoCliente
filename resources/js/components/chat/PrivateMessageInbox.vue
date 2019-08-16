<template>
	<div class="container">
		<section class="header">
      		<h1 class="page-title">Mesajes privados - <small>Recibidos</small></h1>
          <br>
    	</section>

	    <section class="content">
	      <div class="row">
	        <div class="col-sm-8">
	        	<!-- <h1>{{pmStore.messageRec.data}}</h1> -->
	          <table class="table table-striped table-hover table-bordered table-condensed message-table">
              <thead>
              <tr>
                <th>Enviado por</th>
                <th>Asunto</th>
                <th>Tiempo</th>
              </tr>
            </thead>
	            <tbody>
	             <tr v-for="message in pmStore.subjectRec" v-bind:class="[message.read == 0 ? 'unread' : 'read']">
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
  	data (){
  		return {
  			pru: null

  		}
  	},
    computed: {
      ...mapState({
        pmStore: state => state.PrivateMessageStore

      })
    },
    created () {
    	this.$store.dispatch('setUserSubjectsRec', this.user);
    },
    sockets: {
      message(data) {
        let message = JSON.parse(data);
        this.$store.dispatch('newSubjectNotification', message);
      }
    }
  }
</script>

<style>

</style>