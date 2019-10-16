<template>
  <a-sub-menu :key="menuInfo.key">
    <span slot="title">
      <a-icon :type="menuInfo.icon" />
      <span>{{ menuInfo.title }}</span>
    </span>

    <a-menu-item v-for="n in menuInfo.children" :key="n.key">
      <a-icon v-if="n.icon" :type="n.icon" />
      <span>{{ n.title }}</span>
    </a-menu-item>
  </a-sub-menu>
</template>

<script>
export default {
  name: 'SubMenu',
  props: {
    menuInfo: {
      type: Object,
      default: () => {}
    }
  }
};
</script>
