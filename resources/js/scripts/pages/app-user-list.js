/*=========================================================================================
File Name: app-user-list.js
Description: User List page
--------------------------------------------------------------------------------------
Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PIXINVENT
Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$( function () {
  'use strict';
  
  var dtUserTable = $('.user-list-table'),
      newUserSidebar = $('.new-user-modal'),
      newUserForm = $('.add-new-user'),
      stateObj = {
        'Pending' : { title: 'Pending', class: 'badge-light-warning' },
        'Active'  : { title: 'Active', class: 'badge-light-success' },
        'Disabled': { title: 'Disabled', class: 'badge-light-secondary' }
      };
  
  // Users List datatable
  dtUserTable.DataTable({
    ajax: route('api.users.index'), // JSON file to add data
    columns: [
      // columns according to JSON
      { data: 'id' },
      { data: 'name' },
      { data: 'email' },
      { data: 'roles' },
      { data: 'state' },
      // { data: 'current_plan' },
      // { data: 'status' },
      // { data: '' }
    ],
    columnDefs: [
      {
        // For Responsive
        className: 'control',
        orderable: false,
        responsivePriority: 2,
        targets: 0
      },
      {
        // User full name and username
        targets: 1,
        responsivePriority: 4,
        render: function (data, type, full, meta) {
          var $name = full['name'],
          $email = full['email'];
          
          var stateNum = Math.floor(Math.random() * 6) + 1;
          var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
          var $state = states[stateNum],
          $name = full['name'],
          $initials = $name.match(/\b\w/g) || [];
          $initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
          var $output = '<span class="avatar-content">' + $initials + '</span>';
          
          var colorClass = ' bg-light-' + $state + ' ';
          // Creates full output for row
          var $row_output =
          '<div class="d-flex justify-content-left align-items-center">' +
          '<div class="avatar-wrapper">' +
          '<div class="avatar ' +
          colorClass +
          ' mr-1">' +
          $output +
          '</div>' +
          '</div>' +
          '<div class="d-flex flex-column">' +
          '<span class="user_name text-truncate"><span class="font-weight-bold">' +
          $name +
          '</span></span>' +
          '<small class="emp_post text-muted">' +
          $email +
          '</small>' +
          '</div>' +
          '</div>';
          return $row_output;
        }
      },
      {
        // User Role
        targets: 3,
        render: function (data, type, full, meta) {
          var $roles = full['roles'];
          var roleBadgeObj = {
            client        : feather.icons['user'].toSvg({ class: 'font-medium-3 text-primary mr-50' }),
            Cleb          : feather.icons['user-check'].toSvg({ class: 'font-medium-3 text-primary mr-50' }),
            Operator      : feather.icons['settings'].toSvg({ class: 'font-medium-3 text-warning mr-50' }),
            Editor        : feather.icons['edit-2'].toSvg({ class: 'font-medium-3 text-info mr-50' }),
            Admin         : feather.icons['slack'].toSvg({ class: 'font-medium-3 text-danger mr-50' }),
            "Super Admin" : feather.icons['settings'].toSvg({ class: 'font-medium-3 text-danger mr-50' })
          };

          let $output = "";

          $roles.forEach($role => {
            $output += "<span class='text-truncate align-middle'>" + roleBadgeObj[$role['name']] + $role['name'] + '</span>';
          });

          return $output
          
        }
      },
      {
        // User Status
        targets: 4,
        render: function (data, type, full, meta) {
          
          var $state = full['state'];
          return (
            '<span class="badge badge-pill ' + stateObj[$state].class + '" text-capitalized>' + $state + '</span>'
          );
        }
      },
      {
        // Actions
        targets: 5,
        title: 'Actions',
        orderable: false,
        render: function (data, type, full, meta) {
          return (
            '<div class="btn-group">' +
            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
            feather.icons['more-vertical'].toSvg({ class: 'font-small-4' }) +
            '</a>' +
            '<div class="dropdown-menu dropdown-menu-right">' +
            '<a href="' +
            route('system.users.edit',full['id']) +
            '" class="dropdown-item">' +
            feather.icons['archive'].toSvg({ class: 'font-small-4 mr-50' }) +
            'Edit</a>' +
            '<a href="javascript:;" class="dropdown-item delete-record" onClick="removeUser('+full['id']+')">' +
            feather.icons['trash-2'].toSvg({ class: 'font-small-4 mr-50' }) +
            'Delete</a></div>' +
            '</div>' +
            '</div>'
            );
          }
        }
      ],
      order: [[2, 'desc']],
      dom:
      '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
      '<"col-lg-12 col-xl-6" l>' +
      '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
      '>t' +
      '<"d-flex justify-content-between mx-2 row mb-1"' +
      '<"col-sm-12 col-md-6"i>' +
      '<"col-sm-12 col-md-6"p>' +
      '>',
      language: {
        sLengthMenu: 'Show _MENU_',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: 'Add New User',
          className: 'add-new btn btn-primary mt-50',
          attr: {
            'data-toggle': 'modal',
            'data-target': '#modals-slide-in'
          },
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
          }
        }
      ],
      // For responsive popup
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (row) {
              var data = row.data();
              return 'Details of ' + data['name'];
            }
          }),
          type: 'column',
          renderer: $.fn.dataTable.Responsive.renderer.tableAll({
            tableClass: 'table',
            columnDefs: [
              {
                targets: 2,
                visible: false
              },
              {
                targets: 3,
                visible: false
              }
            ]
          })
        }
      },
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      },
    });
    
    // Check Validity
    function checkValidity(el) {
      if (el.validate().checkForm()) {
        submitBtn.attr('disabled', false);
      } else {
        submitBtn.attr('disabled', true);
      }
    }
    
    function removeUser(){
      alert('hola')
    }
    
    // Form Validation
    if (newUserForm.length) {
      newUserForm.validate({
        errorClass: 'error',
        rules: {
          'user-fullname': {
            required: true
          },
          'user-name': {
            required: true
          },
          'user-email': {
            required: true
          }
        }
      });
      
      newUserForm.on('submit', function (e) {
        var isValid = newUserForm.valid();
        e.preventDefault();
        if (isValid) {
          $(this).unbind('submit').submit();
          newUserSidebar.modal('hide');
        }
      });
    }
    
    // To initialize tooltip with body container
    $('body').tooltip({
      selector: '[data-toggle="tooltip"]',
      container: 'body'
    });
    
  });
  
  
  
