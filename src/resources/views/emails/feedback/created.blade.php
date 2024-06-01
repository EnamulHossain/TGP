<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="">
        <table style="border-collapse: collapse;"  class="">
            <tr>
                <td>message : </th>
                <td>{{ $feedback->content }}</th>
            </tr>
            <tr>
                <td>emailAddress: </td>
                <td>{{ $feedback->email }}</td>
            </tr>
            <tr>
                <td>phoneNumber : </td>
                <td>{{ $feedback->phone }}</td>
            </tr>
            <tr>
                <td>firstName: </td>
                <td>{{ $feedback->firstname }}</td>
            </tr>
            <tr>
                <td>lastName: </td>
                <td>{{ $feedback->lastname }}</td>
            </tr>
            <tr>
                <td>InterestedInAddinGrant: </td>
                <td>{{ $feedback->is_interested ? 'Yes' : 'No' }}</td>
            </tr>
            
        </table>
        <a href="">See Current Results</a>

        <p>
            Links contained in this email have been replaced. If you click on a link in the email above, the link will
            be
            analyzed for known threats. If a known threat is found, you will not be able to proceed to the destination.
            If
            suspicious content is detected, you will see a warning.Page 1
        </p>
    </div>

</body>

</html>
