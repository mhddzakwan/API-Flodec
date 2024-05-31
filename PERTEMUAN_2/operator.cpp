#include <iostream>

using namespace std;

int main() {
    int a, b;
    //* membersihkan terminal, sama seperti clrscr
    system("CLS");

    //* Assignment Operator (=)
    a = 3;
    b = 5;



    //*Arithmetical Operator (+, -, *, /, %)
    int tambah = a + b;
    int kurang = a - b;
    int kali = a * b;
    float bagi = (float) a / (float) b;     // *Type casting = mengubah tipe data dari sebuah variabel
    int modulo = a % b;

    cout << "Hasil penjumlahan = " << tambah << endl;
    cout << "Hasil pengurangan = " << kurang << endl;
    cout << "Hasil perkalian = " << kali << endl;
    cout << "Hasil pembagian = " << bagi << endl;
    cout << "Hasil sisa bagi = " << modulo << endl;



    //* Relational Operator (Operator Perbandingan)
    cout << (a == b) << endl;
    cout << (a > b) << endl;
    cout << (a >= b) << endl;
    cout << (a < b) << endl;
    cout << (a <= b) << endl;
    cout << (a != b) << endl;



    //* Logical Operator (&&, ||, !)
    cout << (true && true) << endl;
    cout << (true && false) << endl;
    cout << (false && true) << endl;
    cout << (false && false) << endl;

    cout << (true || true) << endl;
    cout << (true || false) << endl;
    cout << (false || true) << endl;
    cout << (false || false) << endl;

    cout << !true << endl;
    cout << !false << endl;



    //* Bitwise Operator (&, |, ^, ~, <<, >>) --> Biner
    cout << (5 & 7) << endl;
    cout << (5 | 7) << endl;
    cout << (5 ^ 7) << endl;
    cout << (~7) << endl;
    cout << (7 << 2) << endl;
    cout << (7 >> 2) << endl;



    //*Shorthand
    a += 7;     // a = a + 7;
    cout << a << endl;

    a -= 7;     // a = a - 7;
    cout << a << endl;

    a *= 7;     // a = a * 7;
    cout << a << endl;

    a /= 7;     // a = a / 7;
    cout << a << endl;



    //* Increment & Decrement
    //? Pre Increment
    // cout << a << endl;
    // cout << ++a << endl;

    // cout << b << endl;
    // cout << ++b << endl;


    //? Post Increment
    // cout << a++ << endl;
    // cout << a << endl;

    // cout << b++ << endl;
    // cout << b << endl;


    //? Pre Decrement
    // cout << a << endl;
    // cout << --a << endl;

    // cout << b << endl;
    // cout << -b << endl;

    
    //? Post Decrement
    // cout << a-- << endl;
    // cout << a << endl;

    // cout << b-- << endl;
    // cout << b << endl;

}  