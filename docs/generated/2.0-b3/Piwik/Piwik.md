<small>Piwik</small>

Piwik
=====

Main piwik helper class.

Description
-----------

Contains helper methods for a variety of common tasks. Plugin developers are
encouraged to reuse these methods.


Constants
---------

This class defines the following constants:

- `LABEL_ID_GOAL_IS_ECOMMERCE_CART` &mdash; The idGoal query parameter value for the special 'abandoned carts' goal.
- `LABEL_ID_GOAL_IS_ECOMMERCE_ORDER` &mdash; The idGoal query parameter value for the special 'ecommerce' goal.

Methods
-------

The class defines the following methods:

- [`getCurrentUserEmail()`](#getcurrentuseremail) &mdash; Returns the current user's email address.
- [`getSuperUserLogin()`](#getsuperuserlogin) &mdash; Returns the super user's username.
- [`getSuperUserEmail()`](#getsuperuseremail) &mdash; Returns the super user's email address.
- [`getCurrentUserLogin()`](#getcurrentuserlogin) &mdash; Returns the current user's username.
- [`getCurrentUserTokenAuth()`](#getcurrentusertokenauth) &mdash; Returns the current user's token auth.
- [`isUserIsSuperUserOrTheUser()`](#isuserissuperuserortheuser) &mdash; Returns true if the current user is either the super user or the user specified by `$theUser`.
- [`checkUserIsSuperUserOrTheUser()`](#checkuserissuperuserortheuser) &mdash; Check that the current user is either the specified user or the superuser.
- [`isUserIsSuperUser()`](#isuserissuperuser) &mdash; Returns true if the current user is the Super User.
- [`isUserIsAnonymous()`](#isuserisanonymous) &mdash; Returns true if the current user is the special anonymous user or not.
- [`checkUserIsNotAnonymous()`](#checkuserisnotanonymous) &mdash; Checks that the user is not the anonymous user.
- [`checkUserIsSuperUser()`](#checkuserissuperuser) &mdash; Check that the current user is the superuser.
- [`isUserHasAdminAccess()`](#isuserhasadminaccess) &mdash; Returns true if the user has admin access to the requested sites, false if otherwise.
- [`checkUserHasAdminAccess()`](#checkuserhasadminaccess) &mdash; Checks that the current user has admin access to the requested list of sites.
- [`isUserHasSomeAdminAccess()`](#isuserhassomeadminaccess) &mdash; Returns true if the current user has admin access to at least one site.
- [`checkUserHasSomeAdminAccess()`](#checkuserhassomeadminaccess) &mdash; Checks that the current user has admin access to at least one site.
- [`isUserHasViewAccess()`](#isuserhasviewaccess) &mdash; Returns true if the user has view access to the requested list of sites.
- [`checkUserHasViewAccess()`](#checkuserhasviewaccess) &mdash; Checks that the current user has view access to the requested list of sites
- [`isUserHasSomeViewAccess()`](#isuserhassomeviewaccess) &mdash; Returns true if the current user has view access to at least one site.
- [`checkUserHasSomeViewAccess()`](#checkuserhassomeviewaccess) &mdash; Checks that the current user has view access to at least one site.
- [`redirectToModule()`](#redirecttomodule) &mdash; Redirects the current request to a new module and action.
- [`isValidEmailString()`](#isvalidemailstring) &mdash; Returns true if the email address is a valid.
- [`postEvent()`](#postevent) &mdash; Post an event to Piwik's event dispatcher which will execute the event's observers.
- [`addAction()`](#addaction) &mdash; Register an observer to an event.
- [`translate()`](#translate) &mdash; Returns an internationalized string using a translation ID.

<a name="getcurrentuseremail" id="getcurrentuseremail"></a>
<a name="getCurrentUserEmail" id="getCurrentUserEmail"></a>
### `getCurrentUserEmail()`

Returns the current user's email address.

#### Signature

- It returns a `string` value.

<a name="getsuperuserlogin" id="getsuperuserlogin"></a>
<a name="getSuperUserLogin" id="getSuperUserLogin"></a>
### `getSuperUserLogin()`

Returns the super user's username.

#### Signature

- It returns a `string` value.

<a name="getsuperuseremail" id="getsuperuseremail"></a>
<a name="getSuperUserEmail" id="getSuperUserEmail"></a>
### `getSuperUserEmail()`

Returns the super user's email address.

#### Signature

- It returns a `string` value.

<a name="getcurrentuserlogin" id="getcurrentuserlogin"></a>
<a name="getCurrentUserLogin" id="getCurrentUserLogin"></a>
### `getCurrentUserLogin()`

Returns the current user's username.

#### Signature

- It returns a `string` value.

<a name="getcurrentusertokenauth" id="getcurrentusertokenauth"></a>
<a name="getCurrentUserTokenAuth" id="getCurrentUserTokenAuth"></a>
### `getCurrentUserTokenAuth()`

Returns the current user's token auth.

#### Signature

- It returns a `string` value.

<a name="isuserissuperuserortheuser" id="isuserissuperuserortheuser"></a>
<a name="isUserIsSuperUserOrTheUser" id="isUserIsSuperUserOrTheUser"></a>
### `isUserIsSuperUserOrTheUser()`

Returns true if the current user is either the super user or the user specified by `$theUser`.

#### Signature

- It accepts the following parameter(s):
    - `$theUser`
- It returns a `bool` value.

<a name="checkuserissuperuserortheuser" id="checkuserissuperuserortheuser"></a>
<a name="checkUserIsSuperUserOrTheUser" id="checkUserIsSuperUserOrTheUser"></a>
### `checkUserIsSuperUserOrTheUser()`

Check that the current user is either the specified user or the superuser.

#### Signature

- It accepts the following parameter(s):
    - `$theUser`
- It does not return anything.
- It throws one of the following exceptions:
    - `NoAccessException` &mdash; If the user is neither the super user nor the user `$theUser`.

<a name="isuserissuperuser" id="isuserissuperuser"></a>
<a name="isUserIsSuperUser" id="isUserIsSuperUser"></a>
### `isUserIsSuperUser()`

Returns true if the current user is the Super User.

#### Signature

- It returns a `bool` value.

<a name="isuserisanonymous" id="isuserisanonymous"></a>
<a name="isUserIsAnonymous" id="isUserIsAnonymous"></a>
### `isUserIsAnonymous()`

Returns true if the current user is the special anonymous user or not.

#### Signature

- It returns a `bool` value.

<a name="checkuserisnotanonymous" id="checkuserisnotanonymous"></a>
<a name="checkUserIsNotAnonymous" id="checkUserIsNotAnonymous"></a>
### `checkUserIsNotAnonymous()`

Checks that the user is not the anonymous user.

#### Signature

- It does not return anything.
- It throws one of the following exceptions:
    - `NoAccessException` &mdash; if the current user is the anonymous user.

<a name="checkuserissuperuser" id="checkuserissuperuser"></a>
<a name="checkUserIsSuperUser" id="checkUserIsSuperUser"></a>
### `checkUserIsSuperUser()`

Check that the current user is the superuser.

#### Signature

- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if the current user is not the superuser.

<a name="isuserhasadminaccess" id="isuserhasadminaccess"></a>
<a name="isUserHasAdminAccess" id="isUserHasAdminAccess"></a>
### `isUserHasAdminAccess()`

Returns true if the user has admin access to the requested sites, false if otherwise.

#### Signature

- It accepts the following parameter(s):
    - `$idSites`
- It returns a `bool` value.

<a name="checkuserhasadminaccess" id="checkuserhasadminaccess"></a>
<a name="checkUserHasAdminAccess" id="checkUserHasAdminAccess"></a>
### `checkUserHasAdminAccess()`

Checks that the current user has admin access to the requested list of sites.

#### Signature

- It accepts the following parameter(s):
    - `$idSites`
- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; If user doesn&#039;t have admin access.

<a name="isuserhassomeadminaccess" id="isuserhassomeadminaccess"></a>
<a name="isUserHasSomeAdminAccess" id="isUserHasSomeAdminAccess"></a>
### `isUserHasSomeAdminAccess()`

Returns true if the current user has admin access to at least one site.

#### Signature

- It returns a `bool` value.

<a name="checkuserhassomeadminaccess" id="checkuserhassomeadminaccess"></a>
<a name="checkUserHasSomeAdminAccess" id="checkUserHasSomeAdminAccess"></a>
### `checkUserHasSomeAdminAccess()`

Checks that the current user has admin access to at least one site.

#### Signature

- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if user doesn&#039;t have admin access to any site.

<a name="isuserhasviewaccess" id="isuserhasviewaccess"></a>
<a name="isUserHasViewAccess" id="isUserHasViewAccess"></a>
### `isUserHasViewAccess()`

Returns true if the user has view access to the requested list of sites.

#### Signature

- It accepts the following parameter(s):
    - `$idSites`
- It returns a `bool` value.

<a name="checkuserhasviewaccess" id="checkuserhasviewaccess"></a>
<a name="checkUserHasViewAccess" id="checkUserHasViewAccess"></a>
### `checkUserHasViewAccess()`

Checks that the current user has view access to the requested list of sites

#### Signature

- It accepts the following parameter(s):
    - `$idSites`
- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if the current user does not have view access to every site in the list.

<a name="isuserhassomeviewaccess" id="isuserhassomeviewaccess"></a>
<a name="isUserHasSomeViewAccess" id="isUserHasSomeViewAccess"></a>
### `isUserHasSomeViewAccess()`

Returns true if the current user has view access to at least one site.

#### Signature

- It returns a `bool` value.

<a name="checkuserhassomeviewaccess" id="checkuserhassomeviewaccess"></a>
<a name="checkUserHasSomeViewAccess" id="checkUserHasSomeViewAccess"></a>
### `checkUserHasSomeViewAccess()`

Checks that the current user has view access to at least one site.

#### Signature

- It does not return anything.
- It throws one of the following exceptions:
    - [`Exception`](http://php.net/class.Exception) &mdash; if user doesn&#039;t have view access to any site.

<a name="redirecttomodule" id="redirecttomodule"></a>
<a name="redirectToModule" id="redirectToModule"></a>
### `redirectToModule()`

Redirects the current request to a new module and action.

#### Signature

- It accepts the following parameter(s):
    - `$newModule`
    - `$newAction`
    - `$parameters`
- It does not return anything.

<a name="isvalidemailstring" id="isvalidemailstring"></a>
<a name="isValidEmailString" id="isValidEmailString"></a>
### `isValidEmailString()`

Returns true if the email address is a valid.

#### Signature

- It accepts the following parameter(s):
    - `$emailAddress`
- It returns a `bool` value.

<a name="postevent" id="postevent"></a>
<a name="postEvent" id="postEvent"></a>
### `postEvent()`

Post an event to Piwik's event dispatcher which will execute the event's observers.

#### Signature

- It accepts the following parameter(s):
    - `$eventName`
    - `$params`
    - `$pending`
    - `$plugins`
- It returns a `void` value.

<a name="addaction" id="addaction"></a>
<a name="addAction" id="addAction"></a>
### `addAction()`

Register an observer to an event.

#### Description

Observers should normally be defined in plugin objects. It is unlikely that you will
need to use this function.

#### Signature

- It accepts the following parameter(s):
    - `$eventName`
    - `$function`
- It does not return anything.

<a name="translate" id="translate"></a>
<a name="translate" id="translate"></a>
### `translate()`

Returns an internationalized string using a translation ID.

#### Description

If a translation
cannot be found for the ID, the ID is returned.

#### Signature

- It accepts the following parameter(s):
    - `$translationId`
    - `$args`
- It returns a `string` value.
