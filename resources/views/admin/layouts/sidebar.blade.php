
    <!-- BEGIN Aside -->
    <div class="aside">
        <div class="aside-header">
          <div class="aside-title">
            <img  src="{{asset('assets/images/logo.png')}}">
          </div>
          <div class="aside-addon">
            <button
              class="btn btn-label-primary btn-icon btn-lg"
              data-toggle="aside"
            >
              <i class="fa fa-times aside-icon-minimize"></i>
              <i class="fa fa-thumbtack aside-icon-maximize"></i>
            </button>
          </div>
        </div>
        <div class="aside-body" data-simplebar="data-simplebar">
          <!-- BEGIN Menu -->
          <div class="menu">
            <div class="menu-item">
              <a href="{{route('admin.auth.dashboard')}}" class="menu-item-link" >
                <div class="menu-item-icon">
                  <i class="fa fa-desktop"></i>
                </div>
                <span class="menu-item-text">Dashboard</span>
              </a>
            </div>

            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle {{ Request::is('*/location/*') ? 'active' : '' }}">
                <div class="menu-item-icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <span class="menu-item-text">Location</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a href="{{route('admin.auth.country')}}" class="menu-item-link {{ Request::is('*/location/country') ? 'active' : '' }}" >
                    <i class="fas fa-globe-americas"></i>
                    <span class="menu-item-text">Country</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.auth.state')}}" class="menu-item-link {{ Request::is('*/location/state') ? 'active' : '' }}" >
                    <i class="fas fa-map-marked-alt"></i>
                    <span class="menu-item-text">State</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.auth.district')}}" class="menu-item-link {{ Request::is('*/location/district') ? 'active' : '' }}" >
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="menu-item-text">District</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.location.taluk')}}" class="menu-item-link {{ Request::is('*/location/taluk') ? 'active' : '' }}" >
                    <i class="fas fa-map-pin"></i>
                    <span class="menu-item-text">Taluk</span>
                  </a>
                </div>
                  <div class="menu-item">
                      <a href="{{route('admin.location.city')}}" class="menu-item-link {{ Request::is('*/location/city') ? 'active' : '' }}" >
                          <i class="fas fa-map-marker-alt"></i>
                          <span class="menu-item-text">City</span>
                      </a>
                  </div>
                  <div class="menu-item">
                      <a href="{{route('admin.location.event')}}" class="menu-item-link {{ Request::is('*/location/event') ? 'active' : '' }}" >
                          <i class="fas fa-map-marker-alt"></i>
                          <span class="menu-item-text">Event</span>
                      </a>
                  </div>
                <div class="menu-item">
                  <a href="{{route('admin.location.local-bodies')}}" class="menu-item-link {{ Request::is('*/location/local-bodies') ? 'active' : '' }}" >
                    <i class="fas fa-map-pin"></i>
                    <span class="menu-item-text">Local Bodies</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.location.merchant-unit')}}" class="menu-item-link {{ Request::is('*/location/merchant-unit') |  Request::is('*/location/merchant-unit/add') |  Request::is('*/location/merchant-unit/edit') ? 'active' : '' }}" >
                    <i class="fas fa-map-pin"></i>
                    <span class="menu-item-text">Merchant Units</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle {{ Request::is('*/promotor/*') ? 'active' : '' }}">
                <div class="menu-item-icon">
                  <i class="fa fa-map-marker"></i>
                </div>
                <span class="menu-item-text">Promotor</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a href="{{route('admin.promoter.l1-promoter')}}" class="menu-item-link {{ Request::is('*/promoter/l1-promoter') ? 'active' : '' }}" >
                    <i class="fas fa-globe-americas"></i>
                    <span class="menu-item-text">L1 promoter</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle {{ Request::is('*/games/*') ? 'active' : '' }}">
                <div class="menu-item-icon">
                  <i class="fas  fa-gamepad ng-scope"></i>
                </div>
                <span class="menu-item-text">L1 Promotor</span>
                <span class="menu-item-text">Game</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a href="{{route('admin.games.game')}}" class="menu-item-link {{ Request::is('*/games/game') ? 'active' : '' }}">
                    <i class="fas fa-chess"></i>
                    <span class="menu-item-text">Game</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.games.questions')}}" class="menu-item-link {{ Request::is('*/games/questions') ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i>
                    <span class="menu-item-text">Question</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a href="{{route('admin.games.results')}}" class="menu-item-link {{ Request::is('*/games/results') ? 'active' : '' }}">
                    <i class="fas fa-trophy"></i>
                    <span class="menu-item-text">Result Publication</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            {{-- <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-icons"></i>
                </div>
                <span class="menu-item-text">Icons</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/icons/fontawesome.html"
                    data-menu-path="/ltr/icons/fontawesome.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Font Awesome</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/icons/feather.html"
                    data-menu-path="/ltr/icons/feather.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Feather</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-window-restore"></i>
                </div>
                <span class="menu-item-text">Portlet</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/portlet/base.html"
                    data-menu-path="/ltr/portlet/base.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Base</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/portlet/drag.html"
                    data-menu-path="/ltr/portlet/drag.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Draggable</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/portlet/tab.html"
                    data-menu-path="/ltr/portlet/tab.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Tab</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/portlet/tool.html"
                    data-menu-path="/ltr/portlet/tool.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Tool</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-shapes"></i>
                </div>
                <span class="menu-item-text">Widget</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/widgets/general.html"
                    data-menu-path="/ltr/widgets/general.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">General</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/widgets/chart.html"
                    data-menu-path="/ltr/widgets/chart.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Chart</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <!-- BEGIN Menu Section -->
            <div class="menu-section">
              <div class="menu-section-icon">
                <i class="fa fa-ellipsis-h"></i>
              </div>
              <h2 class="menu-section-text">Data</h2>
            </div>
            <!-- END Menu Section -->
            <div class="menu-item">
              <a
                href="../ltr/chart/apex-chart.html"
                data-menu-path="/ltr/chart/apex-chart.html"
                class="menu-item-link"
              >
                <div class="menu-item-icon">
                  <i class="fa fa-chart-pie"></i>
                </div>
                <span class="menu-item-text">Charts</span>
              </a>
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-table"></i>
                </div>
                <span class="menu-item-text">Datatable</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <button class="menu-item-link menu-item-toggle">
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Basic</span>
                    <div class="menu-item-addon">
                      <i class="menu-item-caret caret"></i>
                    </div>
                  </button>
                  <!-- BEGIN Menu Submenu -->
                  <div class="menu-submenu">
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/basic/base.html"
                        data-menu-path="/ltr/datatable/basic/base.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Base</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/basic/footer.html"
                        data-menu-path="/ltr/datatable/basic/footer.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Footer</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/basic/scrollable.html"
                        data-menu-path="/ltr/datatable/basic/scrollable.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Scrollable</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/basic/pagination.html"
                        data-menu-path="/ltr/datatable/basic/pagination.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Pagination</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/basic/menu.html"
                        data-menu-path="/ltr/datatable/basic/menu.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Length menu</span>
                      </a>
                    </div>
                  </div>
                  <!-- END Menu Submenu -->
                </div>
                <div class="menu-item">
                  <button class="menu-item-link menu-item-toggle">
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Advanced</span>
                    <div class="menu-item-addon">
                      <i class="menu-item-caret caret"></i>
                    </div>
                  </button>
                  <!-- BEGIN Menu Submenu -->
                  <div class="menu-submenu">
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/advanced/column-rendering.html"
                        data-menu-path="/ltr/datatable/advanced/column-rendering.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Column rendering</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/advanced/column-visibility.html"
                        data-menu-path="/ltr/datatable/advanced/column-visibility.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Column visibility</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/advanced/footer-callback.html"
                        data-menu-path="/ltr/datatable/advanced/footer-callback.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Footer callback</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/advanced/multiple-controls.html"
                        data-menu-path="/ltr/datatable/advanced/multiple-controls.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Multiple controls</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/advanced/row-callback.html"
                        data-menu-path="/ltr/datatable/advanced/row-callback.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Row callback</span>
                      </a>
                    </div>
                  </div>
                  <!-- END Menu Submenu -->
                </div>
                <div class="menu-item">
                  <button class="menu-item-link menu-item-toggle">
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Source</span>
                    <div class="menu-item-addon">
                      <i class="menu-item-caret caret"></i>
                    </div>
                  </button>
                  <!-- BEGIN Menu Submenu -->
                  <div class="menu-submenu">
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/source/html.html"
                        data-menu-path="/ltr/datatable/source/html.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">HTML</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/source/javascript.html"
                        data-menu-path="/ltr/datatable/source/javascript.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Javascript</span>
                      </a>
                    </div>
                  </div>
                  <!-- END Menu Submenu -->
                </div>
                <div class="menu-item">
                  <button class="menu-item-link menu-item-toggle">
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Extension</span>
                    <div class="menu-item-addon">
                      <i class="menu-item-caret caret"></i>
                    </div>
                  </button>
                  <!-- BEGIN Menu Submenu -->
                  <div class="menu-submenu">
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/autofill.html"
                        data-menu-path="/ltr/datatable/extension/autofill.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Auto fill</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/buttons.html"
                        data-menu-path="/ltr/datatable/extension/buttons.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Buttons</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/column-reorder.html"
                        data-menu-path="/ltr/datatable/extension/column-reorder.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Column reorder</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/fixed-header.html"
                        data-menu-path="/ltr/datatable/extension/fixed-header.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Fixed header</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/fixed-column.html"
                        data-menu-path="/ltr/datatable/extension/fixed-column.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Fixed column</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/key-table.html"
                        data-menu-path="/ltr/datatable/extension/key-table.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Key table</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/row-group.html"
                        data-menu-path="/ltr/datatable/extension/row-group.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Row group</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/row-reorder.html"
                        data-menu-path="/ltr/datatable/extension/row-reorder.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Row reorder</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/scroller.html"
                        data-menu-path="/ltr/datatable/extension/scroller.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Scroller</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/search-panes.html"
                        data-menu-path="/ltr/datatable/extension/search-panes.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Search panes</span>
                      </a>
                    </div>
                    <div class="menu-item">
                      <a
                        href="../ltr/datatable/extension/select.html"
                        data-menu-path="/ltr/datatable/extension/select.html"
                        class="menu-item-link"
                      >
                        <i class="menu-item-bullet"></i>
                        <span class="menu-item-text">Select</span>
                      </a>
                    </div>
                  </div>
                  <!-- END Menu Submenu -->
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <!-- BEGIN Menu Section -->
            <div class="menu-section">
              <div class="menu-section-icon">
                <i class="fa fa-ellipsis-h"></i>
              </div>
              <h2 class="menu-section-text">Form</h2>
            </div>
            <!-- END Menu Section -->
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-dice"></i>
                </div>
                <span class="menu-item-text">Basic</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/form/basic/base.html"
                    data-menu-path="/ltr/form/basic/base.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Base</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/basic/custom.html"
                    data-menu-path="/ltr/form/basic/custom.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Custom</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-fill-drip"></i>
                </div>
                <span class="menu-item-text">Advanced</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/autosize.html"
                    data-menu-path="/ltr/form/advanced/autosize.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Autosize</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/bs-select.html"
                    data-menu-path="/ltr/form/advanced/bs-select.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Bootstrap select</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/bs-maxlength.html"
                    data-menu-path="/ltr/form/advanced/bs-maxlength.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Bootstrap maxlength</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/clipboard.html"
                    data-menu-path="/ltr/form/advanced/clipboard.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Clipboard</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/datepicker.html"
                    data-menu-path="/ltr/form/advanced/datepicker.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Date picker</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/datetimepicker.html"
                    data-menu-path="/ltr/form/advanced/datetimepicker.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Date time picker</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/daterangepicker.html"
                    data-menu-path="/ltr/form/advanced/daterangepicker.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Date range picker</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/inputmask.html"
                    data-menu-path="/ltr/form/advanced/inputmask.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Input mask</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/select2.html"
                    data-menu-path="/ltr/form/advanced/select2.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Select2</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/slider.html"
                    data-menu-path="/ltr/form/advanced/slider.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Slider</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/touchspin.html"
                    data-menu-path="/ltr/form/advanced/touchspin.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Touchspin</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/form/advanced/typeahead.html"
                    data-menu-path="/ltr/form/advanced/typeahead.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Typeahead</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-pencil-ruler"></i>
                </div>
                <span class="menu-item-text">Editor</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/editor/basic.html"
                    data-menu-path="/ltr/editor/basic.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Basic</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/editor/bubble.html"
                    data-menu-path="/ltr/editor/bubble.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Bubble</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/editor/complex.html"
                    data-menu-path="/ltr/editor/complex.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Complex</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <a
                href="../ltr/form/layout.html"
                data-menu-path="/ltr/form/layout.html"
                class="menu-item-link"
              >
                <div class="menu-item-icon">
                  <i class="fa fa-ruler-combined"></i>
                </div>
                <span class="menu-item-text">Layout</span>
              </a>
            </div>
            <div class="menu-item">
              <a
                href="../ltr/form/validation.html"
                data-menu-path="/ltr/form/validation.html"
                class="menu-item-link"
              >
                <div class="menu-item-icon">
                  <i class="fa fa-check"></i>
                </div>
                <span class="menu-item-text">Validation</span>
              </a>
            </div>
            <!-- BEGIN Menu Section -->
            <div class="menu-section">
              <div class="menu-section-icon">
                <i class="fa fa-ellipsis-h"></i>
              </div>
              <h2 class="menu-section-text">Pages</h2>
            </div>
            <!-- END Menu Section -->
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-unlock-alt"></i>
                </div>
                <span class="menu-item-text">Login</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/pages/login/login-1.html"
                    data-menu-path="/ltr/pages/login/login-1.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Login 1</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/pages/login/login-2.html"
                    data-menu-path="/ltr/pages/login/login-2.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Login 2</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-user-plus"></i>
                </div>
                <span class="menu-item-text">Register</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/pages/register/register-1.html"
                    data-menu-path="/ltr/pages/register/register-1.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Register 1</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/pages/register/register-2.html"
                    data-menu-path="/ltr/pages/register/register-2.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Register 2</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div>
            <div class="menu-item">
              <button class="menu-item-link menu-item-toggle">
                <div class="menu-item-icon">
                  <i class="fa fa-unlink"></i>
                </div>
                <span class="menu-item-text">Error</span>
                <div class="menu-item-addon">
                  <i class="menu-item-caret caret"></i>
                </div>
              </button>
              <!-- BEGIN Menu Submenu -->
              <div class="menu-submenu">
                <div class="menu-item">
                  <a
                    href="../ltr/pages/error/error-1.html"
                    data-menu-path="/ltr/pages/error/error-1.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Error 1</span>
                  </a>
                </div>
                <div class="menu-item">
                  <a
                    href="../ltr/pages/error/error-2.html"
                    data-menu-path="/ltr/pages/error/error-2.html"
                    class="menu-item-link"
                  >
                    <i class="menu-item-bullet"></i>
                    <span class="menu-item-text">Error 2</span>
                  </a>
                </div>
              </div>
              <!-- END Menu Submenu -->
            </div> --}}
          </div>
          <!-- END Menu -->
        </div>
    </div>
    <!-- END Aside -->
