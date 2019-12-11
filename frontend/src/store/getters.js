const getters = {
  sidebar: state => state.app.sidebar,
  device: state => state.app.device,
  token: state => state.user.token,
  userId: state => state.user.userId,
  name: state => state.user.name,
  avatar: state => state.user.avatar
};
export default getters;
