<template>
  <div class="login-box">
    <div class="login-logo">
      <b>Admin LTE</b>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">
        Sign in to start your session
      </p>
      <div class="form-group has-feedback">
        <input v-model="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback" />
      </div>
      <div class="form-group has-feedback">
        <input v-model="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback" />
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck" />
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" @click="Login">
            Sign In
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return {
      email: null,
      password: null
    };
  },
  methods: {
    Login() {
      this.$store.dispatch('handleLogin', { email: this.email, password: this.password })
        .then(() => {
          // this.$router.push({ name: 'Main' });
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
