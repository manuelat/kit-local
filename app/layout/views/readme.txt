Structure of folders in the project

* app/layout/default:
    -> out the scope of this project (default of the framework)

* app/layout/views:

_partials
    headers
        header-borrower.html.twig -> the header used when the user is logged in as a borrower
        header-lender.html.twig -> the header used when the user is logged in as a lender
        header-logged-out.html.twig -> the header used when the user is NOT logged in
    footers
        footer-default.html.twig -> the footer used for desktop
        footer-mobile.html.twig -> the footer used for mobile