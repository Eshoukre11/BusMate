class SendAuth {
  late final String email;
  late final String password;
  SendAuth({required this.email, required this.password});
  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = Map<String, dynamic>();
    data['email'] = email;
    data['password'] = password;
    return data;
  }
}
class SendId{
  late final String id;

  SendId({required this.id,});
  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = Map<String, dynamic>();
    data['subscriber_id'] = id;

    return data;
  }
}

class SendRequest {
  late final String email;
  late final String password;
  late final String phone;
  late final String college_number;
  late final String college;
  late final String full_name;
  late final String subscriber_type;
  SendRequest({
    required this.email,
    required this.password,
    required this.phone,
    required this.college_number,
    required this.college,
    required this.full_name,
    required this.subscriber_type,
  });
  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = Map<String, dynamic>();
    data['email'] = email;
    data['password'] = password;
    data['phone'] = phone;
    data['college_number'] = college_number;
    data['college'] = college;
    data['full_name'] = full_name;
    data['subscriber_type'] = subscriber_type;
    return data;
  }
}

class Login {
  Subscriber? subscriber;

  Login({this.subscriber});

  Login.fromJson(Map<String, dynamic> json) {
    subscriber = json['Subscriber'] != null
        ? new Subscriber.fromJson(json['Subscriber'])
        : null;
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.subscriber != null) {
      data['Subscriber'] = this.subscriber!.toJson();
    }
    return data;
  }
}

class Subscriber {
  int? subscriberId;
  String? subscriberType;
  String? fullName;
  String? college;
  int? collegeNumber;
  String? phone;
  String? email;
  String? password;
  String? subscriberState;
  int? semesterId;
  Null? createdAt;
  Null? updatedAt;
  String? Token;

  Subscriber(
      {this.subscriberId,
      this.subscriberType,
      this.fullName,
      this.college,
      this.collegeNumber,
      this.phone,
      this.email,
      this.password,
      this.subscriberState,
      this.semesterId,
      this.createdAt,
      this.updatedAt,
      this.Token});

  Subscriber.fromJson(Map<String, dynamic> json) {
    subscriberId = json['subscriber_id'];
    subscriberType = json['subscriber_type'];
    fullName = json['full_name'];
    college = json['college'];
    collegeNumber = json['college_number'];
    phone = json['phone'];
    email = json['email'];
    password = json['password'];
    subscriberState = json['subscriber_state'];
    semesterId = json['semester_id'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    Token = json['Token'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['subscriber_id'] = this.subscriberId;
    data['subscriber_type'] = this.subscriberType;
    data['full_name'] = this.fullName;
    data['college'] = this.college;
    data['college_number'] = this.collegeNumber;
    data['phone'] = this.phone;
    data['email'] = this.email;
    data['password'] = this.password;
    data['subscriber_state'] = this.subscriberState;
    data['semester_id'] = this.semesterId;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    data['Token'] = this.Token;
    return data;
  }
}

class Check {
  SubscriberC? subscriber;

  Check({this.subscriber});

  Check.fromJson(Map<String, dynamic> json) {
    subscriber = json['Subscriber'] != null
        ? new SubscriberC.fromJson(json['Subscriber'])
        : null;
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.subscriber != null) {
      data['Subscriber'] = this.subscriber!.toJson();
    }
    return data;
  }
}

class SubscriberC {
  String? subscriberType;

  SubscriberC({
    this.subscriberType,
  });

  SubscriberC.fromJson(Map<String, dynamic> json) {
    subscriberType = json['subscriber_type'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();

    data['subscriber_type'] = this.subscriberType;

    return data;
  }
}

class User {
  late int id;
  late String name;
  User({
    required this.id,
    required this.name,
  });

  User.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
  }
  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = Map<String, dynamic>();
    data['id'] = this.id;
    data['name'] = this.name;
    return data;
  }
}

class RegisterAuth {
  late final String name;
  late final String email;
  late final String password;
  late final String college;
  late final String image;
  late final int collegeNumber;
  late final String subStatus;
  RegisterAuth(
      {required this.name,
      required this.email,
      required this.image,
      required this.collegeNumber,
      required this.password,
      required this.subStatus,
      required this.college});

  RegisterAuth.fromJson(Map<dynamic, dynamic> json) {
    name = json['name'];
    email = json['email'];
    image = json['image'];
    password = json['password'];
    college = json['college'];
    collegeNumber = json['college_number'];
    subStatus = json['sub_status'];
  }

  Map<dynamic, dynamic> toJson() {
    final Map<dynamic, dynamic> data = Map<dynamic, dynamic>();
    data['name'] = this.name;
    data['email'] = this.email;
    data['password'] = this.password;
    data['image'] = this.image;
    data['college'] = this.college;
    data['college_number'] = this.collegeNumber;
    data['sub_status'] = this.subStatus;

    return data;
  }
}

class Trips {
  List<Trip>? trips;

  Trips({this.trips});

  Trips.fromJson(Map<String, dynamic> json) {
    if (json['trips'] != null) {
      trips = <Trip>[];
      json['trips'].forEach((v) {
        trips!.add(new Trip.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.trips != null) {
      data['trips'] = this.trips!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class Trip {
  int? tripId;
  int? tripNumber;
  String? tripType;
  String? startPoint;
  String? endPoint;
  String? stops;
  String? tripDay;
  String? startTime;
  int? semesterId;
  Null? createdAt;
  Null? updatedAt;

  Trip(
      {this.tripId,
      this.tripNumber,
      this.tripType,
      this.startPoint,
      this.endPoint,
      this.tripDay,
      this.startTime,
        this.stops,
      this.semesterId,
      this.createdAt,
      this.updatedAt});

  Trip.fromJson(Map<String, dynamic> json) {
    tripId = json['trip_id'];
    tripNumber = json['trip_number'];
    tripType = json['trip_type'];
    startPoint = json['start_point'];
    endPoint = json['end_point'];
    tripDay = json['trip_day'];
    startTime = json['start_time'];
    semesterId = json['semester_id'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    stops = json['stops'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['trip_id'] = this.tripId;
    data['trip_number'] = this.tripNumber;
    data['trip_type'] = this.tripType;
    data['start_point'] = this.startPoint;
    data['end_point'] = this.endPoint;
    data['trip_day'] = this.tripDay;
    data['start_time'] = this.startTime;
    data['semester_id'] = this.semesterId;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    data['stops'] = this.stops;
    return data;
  }
}

class LogDriver {
  SubscriberD? subscriber;

  LogDriver({this.subscriber});

  LogDriver.fromJson(Map<String, dynamic> json) {
    subscriber = json['Subscriber'] != null
        ? new SubscriberD.fromJson(json['Subscriber'])
        : null;
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.subscriber != null) {
      data['Subscriber'] = this.subscriber!.toJson();
    }
    return data;
  }
}

class SubscriberD {
  int? driverId;
  String? subscriberType;
  String? driverName;
  String? driverAddress;
  String? driverNumber;
  String? email;
  String? password;
  String? licenseNumber;
  String? dateOfEmployment;
  int? busId;
  Null? createdAt;
  Null? updatedAt;
  String? token;

  SubscriberD(
      {this.driverId,
      this.subscriberType,
      this.driverName,
      this.driverAddress,
      this.driverNumber,
      this.email,
      this.password,
      this.licenseNumber,
      this.dateOfEmployment,
      this.busId,
      this.createdAt,
      this.updatedAt,
      this.token});

  SubscriberD.fromJson(Map<String, dynamic> json) {
    driverId = json['driver_id'];
    subscriberType = json['subscriber_type'];
    driverName = json['driver_name'];
    driverAddress = json['driver_address'];
    driverNumber = json['driver_number'];
    email = json['email'];
    password = json['password'];
    licenseNumber = json['license_number'];
    dateOfEmployment = json['date_of_employment'];
    busId = json['bus_id'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
    token = json['Token'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['driver_id'] = this.driverId;
    data['subscriber_type'] = this.subscriberType;
    data['driver_name'] = this.driverName;
    data['driver_address'] = this.driverAddress;
    data['driver_number'] = this.driverNumber;
    data['email'] = this.email;
    data['password'] = this.password;
    data['license_number'] = this.licenseNumber;
    data['date_of_employment'] = this.dateOfEmployment;
    data['bus_id'] = this.busId;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    data['Token'] = this.token;
    return data;
  }
}




class MyTrips {
  List<TripsS>? tripss;

  MyTrips({this.tripss});

  MyTrips.fromJson(Map<String, dynamic> json) {
    if (json['trips'] != null) {
      tripss = <TripsS>[];
      json['trips'].forEach((v) {
        tripss!.add(new TripsS.fromJson(v));
      });
    }
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    if (this.tripss != null) {
      data['trips'] = this.tripss!.map((v) => v.toJson()).toList();
    }
    return data;
  }
}

class TripsS {
  int? subscriberTripId;
  TripId? tripId;
  int? subscriberId;
  String? qrCode;
  String? createdAt;
  String? updatedAt;

  TripsS(
      {this.subscriberTripId,
        this.tripId,
        this.subscriberId,
        this.qrCode,
        this.createdAt,
        this.updatedAt});

  TripsS.fromJson(Map<String, dynamic> json) {
    subscriberTripId = json['subscriber_trip_id'];
    tripId =
    json['trip_id'] != null ? new TripId.fromJson(json['trip_id']) : null;
    subscriberId = json['subscriber_id'];
    qrCode = json['QrCode'];
    createdAt = json['created_at'];
    updatedAt = json['updated_at'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['subscriber_trip_id'] = this.subscriberTripId;
    if (this.tripId != null) {
      data['trip_id'] = this.tripId!.toJson();
    }
    data['subscriber_id'] = this.subscriberId;
    data['QrCode'] = this.qrCode;
    data['created_at'] = this.createdAt;
    data['updated_at'] = this.updatedAt;
    return data;
  }
}

class TripId {
  int? tripNumber;
  String? tripType;
  String? tripDay;

  TripId({this.tripNumber, this.tripType, this.tripDay});

  TripId.fromJson(Map<String, dynamic> json) {
    tripNumber = json['trip_number'];
    tripType = json['trip_type'];
    tripDay = json['trip_day'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = new Map<String, dynamic>();
    data['trip_number'] = this.tripNumber;
    data['trip_type'] = this.tripType;
    data['trip_day'] = this.tripDay;
    return data;
  }
}
