import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:qr_flutter/qr_flutter.dart';

class QRScreen extends StatefulWidget {
  final String qrCodeData;

  QRScreen({required this.qrCodeData});
  @override
  _QRScreenState createState() => _QRScreenState(qrCodeData: qrCodeData);
}

class _QRScreenState extends State<QRScreen> {
  String qrCodeData;

  _QRScreenState({required this.qrCodeData});






  @override
  Widget build(BuildContext context) {
    return Scaffold(

      body: Container(
        decoration: BoxDecoration(
          borderRadius: BorderRadius.circular(10),
          gradient: LinearGradient(
            colors: [Colors.white, Colors.deepPurple],
            begin: Alignment.topLeft,
            end: Alignment.bottomRight,
          ),
        ),
        child: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              QrImageView(
                data: qrCodeData,
                version: QrVersions.auto,
                size: 270.0,
              ),
              SizedBox(height: 20),
              Text('Scan this QR code'),
            ],
          ),
        ),
      ),

    );
  }
}
