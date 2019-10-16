<template>
  <a-layout-sider
    :collapsed="collapsed"
    :trigger="null"
    collapsible
    breakpoint="lg"
    @collapse="onCollapse"
  >
    <div class="logo">
      <h2 class="logo__title">
        <b>GQL</b>
      </h2>
    </div>

    <a-menu
      id="menu"
      theme="dark"
      mode="inline"
      :selected-keys="currentKey"
      :default-open-keys="defaultOpenKey"
      @select="onSelect"
    >
      <template v-for="item in menu">
        <a-menu-item
          v-if="!item.children"
          :key="item.name"
        >
          <a-icon v-if="item.meta.icon" :type="item.meta.icon" />
          <span>{{ item.meta.title }}</span>
        </a-menu-item>

        <template v-if="item.children">
          <a-sub-menu :key="item.name">
            <span slot="title">
              <a-icon :type="item.meta.icon" />
              <span>{{ item.meta.title }}</span>
            </span>

            <a-menu-item
              v-for="n in item.children"
              :key="n.name"
            >
              <a-icon v-if="n.meta.icon" :type="n.meta.icon" />
              <span>{{ n.meta.title }}</span>
            </a-menu-item>
          </a-sub-menu>
        </template>
      </template>
    </a-menu>
  </a-layout-sider>
</template>
<script>
export default {
  name: 'Sider',
  props: {
    collapsed: {
      type: Boolean,
      default: () => false
    },
    onCollapse: {
      type: Function,
      default: () => {}
    },
    menu: {
      type: Array,
      default: () => []
    },
    currentKey: {
      type: Array,
      default: () => []
    },
    defaultOpenKey: {
      type: Array,
      default: () => {}
    }
  },
  methods: {
    onSelect({ key }) {
      this.$router.push({ name: key });
    }
  }
};
</script>
