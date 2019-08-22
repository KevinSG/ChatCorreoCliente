<template>
    <div class="chat-message">
    <p>{{messages.message}}</p>
    <small>{{messages.sender_id}}</small>
  </div>
</template>
<script>
  export default{
    props: ['messages']

  }

</script>
<style>
  .chat-message {
    padding: 1rem;
  }

  .chat-message > p {
    margin-bottom: .5rem;
  }
</style>