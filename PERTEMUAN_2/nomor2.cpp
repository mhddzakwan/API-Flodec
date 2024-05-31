#include <iostream>
#include <math.h>
using namespace std;

main(){
    int a,b,c;
    float x1,x2;

    cout << "Masukkan A :"; cin >> a;
    cout << "Masukkan B :"; cin >> b;
    cout << "Masukkan C :"; cin >> c;
    cout << a <<"x^2 + " << b << "x + " << c << " = 0";

    //? Cek Apakah persamaan memiliki akar?
    if ((float)b*b - 4*a*c < 0){
        cout << "\npersamaan tersebut tidak memiliki akar";
    }else {
        //TODO: Gunakan Rumus ABC
        x1 = (-b + sqrt((float)b*b - 4*a*c))/2*a *-1;
        x2 = (-b - sqrt((float)b*b - 4*a*c))/2*a * -1;
        cout << "\nMaka x1 = " << x1 << endl;
        cout << "Maka x2 = " << x2;
    }
}