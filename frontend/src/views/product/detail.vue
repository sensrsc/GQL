<template>
  <div>
    {{ product }}
  </div>
</template>

<script>
import { productDetail } from '@/graphql/product';

export default {
  data() {
    return {
      product: null,
      loading: true
    };
  },
  created() {
    this.fetchProductDetail();
  },
  methods: {
    fetchProductDetail() {
      this.listLoading = true;
      productDetail({ productId: this.$route.params.productId }).then(response => {
        this.product = response.data.products[0] || null;
        this.loading = false;
      });
    }
  }
};
</script>
