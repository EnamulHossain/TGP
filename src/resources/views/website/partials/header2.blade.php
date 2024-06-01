<style>
  .btn {
      border: 2px solid #E0AE67;
      color: white;
      width: 100px;
      cursor: pointer;
      height: 40px !important;
      border-radius: 10px;
  }

  .success {
      border-color: #E0AE67;
      background-color: #E0AE67;
      color: white !important;
      text-decoration: none !important;
  }

  .success:hover {
      background-color: white !important;
      color: black !important;
      text-decoration: none !important;
  }
</style>
<header class="home sticky" id="headerArea">
  <div class="layoutContainer" id="utilityArea">
      <div class="siteBounds">
          <div class="utilityWrapper">
              <nav class="utility">
                  <!--BeginNoIndex-->
                  <ul navname="Utility" navzone="$Zone">
                      <!--EndNoIndex-->
                  </ul>
              </nav>
              <div class="searchArea">
                  <div class="searchBar">
                      <!--BeginNoIndex-->
                      <input aria-label="Search by Keyword" id="searchBarTop_searchTerms" maxlength="200"
                          name="searchBarTop_searchTerms"
                          onkeydown="NWS.Util.UI.DefaultButton(event, document.getElementById('searchBarTop_searchGo'))"
                          placeholder="Search" type="text" value="">
                      <input aria-label="Search" class="search" id="searchBarTop_searchGo"
                          name="searchBarTop_searchGo"
                          onclick="
              NWS.Util.UI.SearchSubmit('/PublicSite/OffNav/Search-Results', document.getElementById('searchBarTop_searchTerms'))"
                          type="button" value="Search">
                      <!--EndNoIndex-->
                      </input>
                      </input>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="siteBounds">
      <div id="logoArea">
          <a href="{{ url('/') }}">
              <img alt="Home Page" border="0" src="assets/TPG-Logo-black-type-1.png" />
          </a>
      </div>
      <input id="navOpener" type="checkbox">
      <div id="navArea">
          <label for="navOpener" id="Hamburger" onkeydown="NWS.Util.UI.DefaultButton(event, this)" role="button"
              tabindex="0">
              <div id="navButton">
                  <span>
                      Menu
                  </span>
                  <br>
                  <span aria-hidden="true" class="fa">
                  </span>
                  </br>
              </div>
          </label>
          <div class="searchArea">
              <div class="searchBar">
                  <!--BeginNoIndex-->
                  <input aria-label="Search by Keyword" id="mobileSearchBar_searchTerms" maxlength="200"
                      name="mobileSearchBar_searchTerms"
                      onkeydown="NWS.Util.UI.DefaultButton(event, document.getElementById('mobileSearchBar_searchGo'))"
                      placeholder="Search" type="text" value="">
                  <input aria-label="Search" class="search" id="mobileSearchBar_searchGo"
                      name="mobileSearchBar_searchGo"
                      onclick="
              NWS.Util.UI.SearchSubmit('/PublicSite/OffNav/Search-Results', document.getElementById('mobileSearchBar_searchTerms'))"
                      type="button" value="Search">
                  <!--EndNoIndex-->
                  </input>
                  </input>
              </div>
          </div>
          <div class="navInner">
              <nav class="top">
                  <!--BeginNoIndex-->
                  <ul class="menu" navname="TopMenu" navzone="Top">
                      <li class="navFirst">
                          <a href="{{ route('pricing.plans') }}">
                              <span>
                                  Pricing & Plans
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="https://www.biz2credit.com/thegrantportal/quick-apply" target="_blank"
                              title="Opens in a new window">
                              <span>
                                  SBA/Business Loans
                              </span>
                          </a>
                      </li>
                      <li>
                          <a class="hasChild" href="{{ route('contact_us') }}">
                              <span class="arrow">
                              </span>
                              <span>
                                  Contact Us
                              </span>
                          </a>
                          {{-- <a aria-expanded="false" aria-haspopup="true" class="toggleMenuButton" role="button"
                              tabindex="0">
                              <span class="screenReaderOnly">
                                  show submenu for  Contact Us
                              </span>
                          </a> --}}
                          <ul>
                              <li>
                                  <a href="{{ route('contact_us') }}">
                                      <span>
                                          Contact Us
                                      </span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('hire-a-grant-writer') }}">
                                      <span>
                                          Hire A Grant Writer
                                      </span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('i-am-a-grant-provider') }}">
                                      <span>
                                          I Am A Grant Provider
                                      </span>
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('i-am-a-grant-writer') }}">
                                      <span>
                                          I Am A Grant Writer
                                      </span>
                                  </a>
                              </li>
                              @auth()
                                  <li>
                                      <a href="{{ route('website.add.grant') }}">
                                          <span>
                                              Add Grants
                                          </span>
                                      </a>
                                  </li>
                              @endauth
                          </ul>
                      </li>

                      <li class="">
                          <a class="" href="{{ route('about-us') }}">
                              <span>
                                  About Us
                              </span>
                          </a>
                      </li>
                      @guest
                          <li>
                              <a href="{{ route('website.login') }}">
                                  <span>
                                      Log In
                                  </span>
                              </a>
                          </li>
                          <li class="navLast" style="text">
                              <a href="{{ route('website.signup') }}">
                                  <span>
                                      Sign Up
                                  </span>
                              </a>
                          </li>
                      @endguest

                      @auth()
                          <li>
                              <a href="{{ route('website.login') }}">
                                  <span>
                                      Log Out
                                  </span>
                              </a>
                          </li>
                          <li class="">
                              <a class="btn success" style="" href="{{ route('my-profile') }}">
                                  <span>
                                      Profile
                                  </span>
                              </a>
                          </li>
                      @endauth

                  </ul>
                  <!--EndNoIndex-->
              </nav>
              <nav class="utility">
                  <!--BeginNoIndex-->
                  <ul navname="Utility" navzone="$Zone">
                      <!--EndNoIndex-->
                  </ul>
              </nav>
          </div>
          <div style="display:none;">
          </div>
      </div>
      </input>
  </div>


</header>
