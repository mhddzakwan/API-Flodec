//* Library untuk bahasa C++
#include <iostream>
//* Agar tidak perlu menggunakan std::
using namespace std;

main(){
    //* Deklarasi variabel
    string nama; //* kalau di cpp, terdapat string
    int nim;
    char kom;
    float ip;

    //* cout untuk menampilkan output
    cout << "Hello World" << endl; //* endl = newline

    cout << "Masukkan Nama : ";
    //* cin = Maksimal 1 kata, getline = bisa lebih dari 1 kata
    //! Karena nama dapat lebih dari 1 kata, jangan gunakan cin!
    // cin >> nama;
    getline(cin, nama);

    cout << "Masukkan NIM : ";
    cin >> nim;

    cout << "Masukkan KOM : ";
    cin >> kom;

    cout << "Masukkan IP : ";
    cin >> ip;

    cout << "NAMA : " << nama << endl;
    cout << "NIM : " << nim << endl;
    cout << "KOM : " << kom << endl;
    cout << "IP : " << ip << endl;
}