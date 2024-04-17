part of 'authcubit_cubit.dart';

@immutable
sealed class AuthcubitState {}

final class AuthcubitInitial extends AuthcubitState {}
class AuthcubitWaiting extends AuthcubitState {}
class AuthcubitLogout extends AuthcubitState {}
class AuthcubitFailed extends AuthcubitState {}
class GoHome extends AuthcubitState {}
class GoQr extends AuthcubitState {}
class GoTrack extends AuthcubitState {}
class GoProfile extends AuthcubitState {}
class GoHomeD extends AuthcubitState {}
class GoQrD extends AuthcubitState {}
class GoTrackD extends AuthcubitState {}
class GoProfileD extends AuthcubitState {}
class CheckcubitLoged extends AuthcubitState {
  // final Login authResponse;
  final Check check;
  // Add this line to store the authentication response

  CheckcubitLoged(this.check); // Add this constructor

  @override
  bool operator ==(Object o) {
    if (identical(this, o)) return true;
    return o is CheckcubitLoged && o.check == check;
  }

  @override
  int get hashCode => check.hashCode;
}
class AuthcubitLoged extends AuthcubitState {
  final Login authResponse;

  // Add this line to store the authentication response

  AuthcubitLoged(this.authResponse); // Add this constructor

  @override
  bool operator ==(Object o) {
    if (identical(this, o)) return true;
    return o is AuthcubitLoged && o.authResponse == authResponse;
  }

  @override
  int get hashCode => authResponse.hashCode;
}
class AuthcubitLogedD extends AuthcubitState {
  // final Login authResponse;
  final LogDriver auth;
  // Add this line to store the authentication response

  AuthcubitLogedD(this.auth); // Add this constructor

  @override
  bool operator ==(Object o) {
    if (identical(this, o)) return true;
    // return o is AuthcubitLogedD && o.auth == auth;
    return o is AuthcubitLogedD && o.auth == auth;
  }


  @override
  int get hashCode => auth.hashCode;
}