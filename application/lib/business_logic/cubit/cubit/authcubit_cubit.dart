import 'dart:convert';
import 'dart:developer';
import 'package:flutter/cupertino.dart';
import 'package:http/http.dart' as http;
import 'package:bloc/bloc.dart';
import 'package:mo7/data/model/sendAuth.dart';

part 'authcubit_state.dart';

class AuthcubitCubit extends Cubit<AuthcubitState> {
  AuthcubitCubit() : super(AuthcubitInitial());

  var _Token;
  var _subscriber_id;
  var _subscriber_typ;
  var _subscriber_typ_c;
  var _full_name;
  var _college;
  var _college_numbe;
  var _phone;
  var _email;

  Map<String, dynamic> js = {};
  Map<String, String> get headers => {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Content-Length": jsonEncode(js).length.toString(),
    //"Authorization": "Bearer $_token",
  };

  Future loginMethod({required String username, required String password}) async {
    emitWaiting();

    try {
      js = SendAuth(email: username, password: password).toJson();
      final body = jsonEncode(js);
      final contentLength = utf8.encode(body).length;
      // Map<String, String> headers = {
      //   'Postman-Token': '<calculated when request is sent>',
      //   'Content-Type': 'application/json',
      //   'Content-Length': contentLength.toString(),
      //   'Host': '<calculated when request is sent>',
      //   'User-Agent': 'PostmanRuntime/7.36.3',
      //   'Accept': '*/*',
      //   'Accept-Encoding': 'gzip, deflate, br',
      //   'Connection': 'keep-alive',
      // };

      var responce = await http.post(
          Uri.parse('http://192.168.139.25:8000/api/Login'),
          body: body,
          encoding: Encoding.getByName("utf-8"),
          headers: headers);

      if (responce.statusCode == 200) {
        var tt = Login.fromJson(jsonDecode(responce.body));
        var cc = Check.fromJson(jsonDecode(responce.body));
        var dd = LogDriver.fromJson(jsonDecode(responce.body));
        // _Token = tt.subscriber?.Token;
        // _subscriber_id = tt.subscriber?.subscriberId;
        // _subscriber_typ = tt.subscriber?.subscriberType;
        // _subscriber_typ_c = cc.subscriber?.subscriberType;
        // _full_name = tt.subscriber?.fullName;
        // _college = tt.subscriber?.college;
        // _college_numbe = tt.subscriber?.collegeNumber;
        // _phone = tt.subscriber?.phone;
        // _email = tt.subscriber?.email;

        print('fuck you ');
        print(dd.subscriber?.driverName.toString());

        print('fuck you ');
        print(responce.body);

        emitCheck(cc);
        if (cc.subscriber?.subscriberType == 'student') {
          emitLoged(tt);

          print('fuck you ');
          print(tt.subscriber?.email.toString());

          print('fuck you ');
        } else if (cc.subscriber?.subscriberType == 'driver') {
          emitLogedD(dd);
          print('fuck you ');
          print(dd.subscriber?.email.toString());

          print('fuck you ');
        }
      } else {
        print('wellcom');
        print(responce.body);
        emitFailed();
        log(responce.statusCode.toString());
      }
    } on Exception catch (error) {
      log(error.toString());
      emitFailed();
    }
  }

  Future registerMethod({
    required String mail,
    required String pass,
    required String phone,
    required String college_number,
    required String college,
    required String full_name,
    required String subscriber_type,
  }) async {
    emitWaiting();
    try {
      js = SendRequest(
        full_name: full_name,
        email: mail,
        password: pass,
        college: college,
        college_number: college_number,
        subscriber_type: subscriber_type,
        phone: phone,
      ).toJson();
      var responce = await http.post(
          Uri.parse('http://192.168.139.25:8000/api/SendSubscribtionRequest'),
          body: jsonEncode(js),
          headers: headers);
      if (responce.statusCode == 200) {
        print(responce.body);
      } else {
        emitFailed();
        log(responce.statusCode.toString());
      }
    } on Exception catch (error) {
      log(error.toString());
      emitFailed();
    }
  }



  /// update index function to update the index onTap in BottomNavigationBar
  ///
  Future<List<Trip>> fetchTrips() async {
    Map<String, String> headers = {
      'Postman-Token': '<calculated when request is sent>',
      'Content-Type': 'application/json',
      'Content-Length': '<calculated when request is sent>',
      'Host': '<calculated when request is sent>',
      'User-Agent': 'PostmanRuntime/7.36.3',
      'Accept': '*/*',
      'Accept-Encoding': 'gzip, deflate, br',
      'Connection': 'keep-alive',
    };
    final response = await http.get(Uri.parse('localhost:8000/api/ShowTrip'));
    if (response.statusCode == 200) {
      final List<dynamic> data = jsonDecode(response.body)['trips'];
      return data.map((tripJson) => Trip.fromJson(tripJson)).toList();
    } else {
      throw Exception('Failed to load trips');
    }
  }

  /// for navigation button on single page
  void getHome() => emit(GoHome());
  void getTasks() => emit(GoQr());
  void getTrack() => emit(GoTrack());
  void getProfile() => emit(GoProfile());
  void emitFailed() => emit(AuthcubitFailed());
  void emitWaiting() => emit(AuthcubitWaiting());
  void emitLoged(Login authResponse) => emit(AuthcubitLoged(authResponse));
  void emitLogedD(LogDriver auth) => emit(AuthcubitLogedD(auth));
  void emitCheck(Check check) => emit(CheckcubitLoged(check));
  void emitLogout() => emit(AuthcubitLogout());
}

class BottomNavCubit extends Cubit<int> {
  BottomNavCubit() : super(0);

  /// update index function to update the index onTap in BottomNavigationBar
  void updateIndex(int index) => emit(index);

  /// for navigation button on single page
  void getHome() => emit(0);
  void getTasks() => emit(1);
  void getTrack() => emit(2);
  void getProfile() => emit(3);
}

class BottomNavDriverCubit extends Cubit<int> {
  BottomNavDriverCubit() : super(0);

  /// update index function to update the index onTap in BottomNavigationBar
  void updateIndex(int index) => emit(index);

  /// for navigation button on single page
  void getHomeD() => emit(0);
  void getQrD() => emit(1);
  void getTrackD() => emit(2);
  void getProfileD() => emit(3);
}
