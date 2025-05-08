<table>
    <thead>
        <tr>
            <td>No.</td>
            <td>Nick Name</td>
            <td>Registered K8 Username</td>
            <td>Email</td>
            <td>User ID</td>
            <td>Retweet URL</td>
            <td>Comment</td>
            <td>Image</td>
            <td>K8 ID</td>
            <td>IP</td>
            <td>Is Winner</td>
            <td>Joined Date</td>
            @foreach ($questions as $question)
                @if($question->question_type == 'single_select' || $question->question_type == 'multiple_select')
                    <td>
                        {{ $question->question_title }}
                    </td>
                @else
                    <td>
                        {{ $question->question_title }}
                    </td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($participants as $participant)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->k8_username }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ $participant->user_id }}</td>
                <td>{{ $participant->retweet_url }}</td>
                <td>{{ $participant->comment }}</td>
                <td>{{ $participant->image }}</td>
                <td>{{ $participant->sns_id }}</td>
                <td>{{ $participant->ip }}</td>
                <td>
                    @if($participant->is_winner == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{ $participant->created_at }}</td>
                
                @foreach ($questions as $question)
                    @if($question->question_type == 'single_select' || $question->question_type == 'multiple_select')
                        <td>
                            @foreach ($participant->choices as $participant_choice)
                                @foreach ($question->questionChoices as $question_choice)
                                    @if($participant_choice->id == $question_choice->id)
                                        [{{ $question_choice->choice }}]
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                    @else
                        @foreach ($messages as $message)
                            <td>
                            </td>
                        @endforeach
                    @endif
                @endforeach

                
                
            </tr>
        @endforeach
    </tbody>
</table>