#include <iostream>

using namespace std;

#include "CircularLinkedList.h"

int main()
{
    CircularLinkedList *ls = new CircularLinkedList();

    ls->AppendToCircularLinkedList(1, 98);
    ls->AppendToCircularLinkedList(4, 87);
    ls->AppendToCircularLinkedList(6, 79);
    ls->AppendToCircularLinkedList(9, 86);
    ls->AppendToCircularLinkedList(3, 70);

    ls->AddToTheBeginning(5, 100);
    ls->AddToTheBeginning(7, 88);

    ls->PrintCircularLinkedList();

//    for( int i=0; i<10; i++ ){
//        ls->DeleteTheLastNode();
//        ls->PrintCircularLinkedList();
//    }

    ls->DeleteTheNodeAtGivenIndex(3); //bu komut ile DeleteTheNodeAtGivenIndex fonksiyonunu çaðýrýyoruz ve 3 indexli karakteri siliyoruz

	//ls->DeleteTheFirstNode();//bu komut ile DeleteTheFirstNode fonksiyonunu çaðýrýyoruz ve ilk karakteri siliyoruz.
	
	//ls->DeleteTheLastNode();//bu komut ile DeleteTheLastNode fonksiyonunu çaðýrýyoruz ve son karakteri siliyoruz
	

    ls->PrintCircularLinkedList();

    return 0;
}

