<template>
  <a-layout id="screen">
    <Sider
      :collapsed="collapsed"
      :on-collapse="handleMenuCollapse"
      :menu="menu"
      :current-key="[currentRoute]"
      :default-open-key="defaultOpenKeys()"
    />

    <a-layout>
      <Header :collapsed="collapsed" :on-collapse="handleMenuCollapse" />

      <a-breadcrumb>
        <a-breadcrumb-item v-for="item in breadList" :key="item.name || ''">
          <router-link
            v-if="item.name != currentRoute"
            :to="{ path: item.path === '' ? '/' : item.path }"
          >
            {{ item.meta.title }}
          </router-link>
          <span v-else>{{ item.meta.title }}</span>
        </a-breadcrumb-item>
      </a-breadcrumb>

      <a-layout-content id="content">
        <router-view />
      </a-layout-content>

      <Footer />
    </a-layout>
  </a-layout>
</template>
<script>
import Sider from './Sider';
import Header from './Header';
import Footer from './Footer';
import { mapGetters } from 'vuex';

export default {
  name: 'Layout',
  components: {
    Sider,
    Header,
    Footer
  },
  data() {
    return {
      collapsed: false
    };
  },
  computed: {
    ...mapGetters([
      'menu'
    ]),
    currentRoute() {
      return this.$route.name;
    },
    breadList() {
      return this.$route.matched.reduce((acc, cur) => {
        acc.push(cur);
        return acc;
      }, []);
    }
  },
  methods: {
    handleMenuCollapse(collapsed) {
      this.collapsed = collapsed;
    },
    defaultOpenKeys() {
      if (!this.breadList.length) return [];
      return [this.breadList[1].name || ''];
    }
  }
};
</script>

<style lang="scss">
#screen {
  > .ant-layout {
    min-height: 100vh;
  }

  #header {
    background: #fff;
    padding: 0;

    .trigger {
      font-size: 18px;
      line-height: 64px;
      padding: 0 24px;
      cursor: pointer;
      transition: color .3s;

      &:hover {
        color: #1890ff;
      }
    }
  }

  #content {
    margin: 20px 15px;
    padding: 24px;
    background: #fff;
    min-height: 280px;
  }

  .logo {
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;

    &__title{
      color: #fff;
      margin: 0;
    }
  }

  .ant-breadcrumb {
    padding: 16px 24px 0;
    font-size: 14px;

    &__current {
      height: 15px;
    }
  }
}
</style>
