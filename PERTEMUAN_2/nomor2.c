#include <stdio.h>
#include <math.h>

void main(){
    int a,b,c;
    float x1,x2;
    printf("Masukkan A : "); scanf("%d", &a);
    printf("Masukkan B : "); scanf("%d", &b);
    printf("Masukkan C : "); scanf("%d", &c);

    printf("%dx^2 + %dx + %d = 0", a,b,c);
    if (b*b - 4*a*c < 0){
        printf("\nPersamaan tersebut tidak memiliki akar");
    }else{
        x1 = (-b + sqrt(b*b - 4*a*c))/2*a *-1;
        x2 = (-b - sqrt(b*b - 4*a*c))/2*a * -1;
        printf("\nMaka x1=%2.f", x1);
        printf("\nMaka x2=%2.f", x2);
    }

}