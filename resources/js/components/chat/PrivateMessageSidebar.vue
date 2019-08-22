
<template>
  <div class="col-3">
    <div class="list-group" id="list-tab" role="tablist">
      <!-- <a class="list-group-item list-group-item-action" id="list-inbox-list" data-toggle="list" href="#list-inbox" role="tab" aria-controls="inbox">Bandeja de entrada</a>
      <a class="list-group-item list-group-item-action" id="list-enviados-list" data-toggle="list" href="#list-enviados" role="tab" aria-controls="enviados">Elementos enviados</a> -->
      <a class="list-group-item list-group-item-action active" id="list-nuevo-list" data-toggle="list" href="#list-nuevo" role="tab" aria-controls="nuevo">Mensaje nuevo</a>
    </div>
  </div>
</template>
<script>
  export default {

  }
</script>
<style>
.pointer {
  cursor: pointer;
}
 a.href-active {
  color: #333333;
  background-color: transparent;
}
li>a.href {
  color: #fff;
  background-color: #337ab7;
}
.col-with-right-border {
  border-right: 1px solid $border-color;
}
</style>
