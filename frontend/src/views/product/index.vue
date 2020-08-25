<template>
  <div class="app-container">
    <el-table
      v-loading="loading"
      :data="list"
      element-loading-text="Loading"
      border
      fit
      highlight-current-row
    >
      <el-table-column align="center" label="Product Id" width="95">
        <template slot-scope="scope">
          {{ scope.row.productId }}
        </template>
      </el-table-column>
      <el-table-column label="Product Name">
        <template slot-scope="scope">
          {{ scope.row.slug }}
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
import { productList } from '@/graphql/product';

export default {
  data() {
    return {
      list: null,
      loading: true
    };
  },
  created() {
    this.fetchProductList();
  },
  methods: {
    fetchProductList() {
      this.listLoading = true;
      productList().then(response => {
        this.list = response.data.products;
        this.loading = false;
      });
    }
  }
};
</script>
