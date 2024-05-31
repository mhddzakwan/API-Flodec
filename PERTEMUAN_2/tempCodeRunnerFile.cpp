    cout << a <<"x^2 + " << b << "x + " << c << " = 0";
    if (b*b - 4*a*c < 0){
        cout << "\npersamaan tersebut tidak memiliki akar";
    }else {
        x1 = (-b + sqrt(b*b - 4*a*c))/2*a *-1;
        x2 = (-b - sqrt(b*b - 4*a*c))/2*a * -1;
        cout << "\nMaka x1 = " << x1 << endl;
        cout << "Maka x2 = " << x2;
    }