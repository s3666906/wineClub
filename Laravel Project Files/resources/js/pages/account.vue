<template>
  <div>

    <div class="breadcrumb-wrapper">

      <ol class="breadcrumbs" role="navigation" aria-label="breadcrumbs">
        <li>
          <a href="/" title="Home"><i class="fas fa-home" aria-hidden="true"></i></a>
        </li>

        <li>
          <span aria-hidden="true"><i class="fas fa-chevron-right m-r-075" aria-hidden="true"></i></span>
          <span>User Account</span>
        </li>

      </ol></div>

      <div class=" container py-4">
        <div class="card">
          <div class="card-header">
            User Account Details
          </div>
          <div class="card-body">

            <dl class="row">
        <dt class="col-sm-3">Customer Name</dt>
        <dd class="col-sm-9">{{user.name}}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9">
          {{user.email}}
        </dd>

        <dt class="col-sm-3">Membership Level</dt>
        <dd class="col-sm-9">{{user.membership}}</dd>

        <dt class="col-sm-3 text-truncate">Auto Renew</dt>
        <dd class="col-sm-9">{{ user.autorenew == 1 ? 'Yes' : 'No'}}</dd>

      </dl>
          </div>
        </div>


      </div>




    </div>
  </template>

  <script>
    export default {
      name: "account",
      props: {
        user : { type : Object }
      },
      mounted() {},
    }
  </script>
