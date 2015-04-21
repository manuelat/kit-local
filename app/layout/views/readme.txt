Structure of folders in the project

* app/layout/default:
    -> out the scope of this project (default of the framework)

* app/layout/views:

_partials
    headers
        LOGGED OUT
        header.html.twig -> the header used for DESKTOP when the user is NOT logged in
        header-mobile.html.twig -> the header used for MOBILE, TABLET when the user is NOT logged in

        LOGGED IN
        account-header-mobile.html.twig -> the header used for MOBILE, TABLET when the LENDER is logged in
        account_header_borrower_for_testing.html.twig -> the header used for MOBILE, TABLET when the BORROWER is logged in
        account-header.html.twig -> the header user for DESKTOP when the user is logged in

    footers
        footer.html.twig -> the footer used for mobile, tablet and desktop

IMPORTANT!!!!

line 320 from variables.less -> bootstrap instead of @screen-sm-min put @screen-md-min;
// Navbar collapse
//** Point at which the navbar becomes uncollapsed.
@grid-float-breakpoint:     @screen-md-min;