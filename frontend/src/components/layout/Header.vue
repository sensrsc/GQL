<template>
  <a-layout-header id="header">
    <a-icon
      class="trigger"
      :type="collapsed ? 'menu-unfold' : 'menu-fold'"
      @click.native="trigger"
    />

    <div class="user-wrapper">
      <span class="action">
        <a-badge count="5">
          <a-icon type="bell" />
        </a-badge>
      </span>

      <a-dropdown>
        <span class="action">
          <a-avatar class="avatar" size="small" icon="user" />
          <span>Ross Jack</span>
        </span>
        <a-menu slot="overlay">
          <a-menu-item key="1">
            <a-icon type="user" />
            <span>account setting</span>
          </a-menu-item>
          <a-menu-item key="2">
            <a-icon type="setting" />
            <span>permission</span>
          </a-menu-item>
          <a-menu-divider />
          <a-menu-item key="3">
            <a-icon type="logout" />
            <span>sign in/sign out</span>
          </a-menu-item>
        </a-menu>
      </a-dropdown>
    </div>
  </a-layout-header>
</template>

<script>
export default {
  name: 'Header',
  props: {
    collapsed: {
      type: Boolean,
      default: () => false
    },
    onCollapse: {
      type: Function,
      default: () => {}
    }
  },
  methods: {
    trigger() {
      this.onCollapse(!this.collapsed);
    }
  }

};
</script>

<style lang="scss" scoped>
.user-wrapper {
  float: right;
  padding: 0 10px;
  position: relative;
  a {
    position: relative;
  }
  .action {
    cursor: pointer;
    display: inline-block;
    padding: 0 15px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    height: 100%;
    color: rgba(0, 0, 0, 0.65);
    text-align: center;
    &:hover {
      background: rgba(0, 0, 0, 0.025);
    }
    .anticon {
      font-size: 16px;
      padding: 4px;
    }
  }
  .avatar {
    margin: 20px 8px 20px 0;
    vertical-align: middle;
  }
}
</style>

