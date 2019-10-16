function loadView(view) {
  return () => import(`@/views/${view}`);
}

export const routers = [
  {
    name: 'Dashboard',
    path: '/dashboard',
    component: loadView('Dashboard'),
    meta: {
      icon: 'dashboard',
      title: 'dashboard'
    }
  },
  {
    name: 'List',
    path: '/list',
    redirect: { name: 'BasicTable' },
    component: {
      render: h => h('router-view')
    },
    meta: {
      title: 'list',
      icon: 'table'
    },
    children: [
      {
        name: 'BasicTable',
        path: '/list/basic-table',
        component: loadView('table/BasicTable'),
        meta: {
          title: 'basic table'
        }
      }
    ]
  }
];
